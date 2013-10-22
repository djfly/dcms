<?php

class LinkController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='/layouts/column2';
	public $menu = array(
		array('label'=>'链接管理', 'icon'=>'link', 'url'=>array('/admin/link/admin')),
		array('label'=>'创建链接', 'icon'=>'plus', 'url'=>array('/admin/link/create')),
		);
	public function actions()
	{
	    return array(
	        'toggle' => array(
	            'class'=>'bootstrap.actions.TbToggleAction',
	            'modelName' => 'Link',
	        )
	    );
	}
	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
		array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
			'users'=>array('*'),
			),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('create','update'),
			'users'=>array('@'),
			),
		array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','toggle'),
			'users'=>array('admin'),
			),
		array('deny',  // deny all users
			'users'=>array('*'),
			),
		);
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new Link;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Link']))
		{
			$model->attributes=$_POST['Link'];
			$image=CUploadedFile::getInstance($model,'img');

			if(!empty($image)){
				$dir=dirname(Yii::app()->basePath).DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.'link'.DIRECTORY_SEPARATOR;
				if(!is_dir($dir)) {
					mkdir($dir, 0777);
					touch($dir.DIRECTORY_SEPARATOR.'index.html');
				}
				$name=date('His').strtolower(Admin::random(16)).strrchr($image->name,'.');
				$image->saveAs($dir.$name);
				$model->img='upload'.DIRECTORY_SEPARATOR.'link'.DIRECTORY_SEPARATOR.$name;
			}
			if($model->save())
				Yii::app()->user->setFlash('success', "创建成功！");
			$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

		if(isset($_POST['Link']))
		{
			$model->attributes=$_POST['Link'];
			if($model->save())
				Yii::app()->user->setFlash('success', "保存成功！");
			$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
	// we only allow deletion via POST request
			$this->loadModel($id)->delete();

	// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				Yii::app()->user->setFlash('success', "删除成功！");
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Link('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Link'])){
			$model->attributes=$_GET['Link'];
		}
		$this->render('admin',array(
			'model'=>$model
			));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=Link::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function random($length, $numeric = 0) {
		$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
		$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
		if($numeric) {
			$hash = '';
		} else {
			$hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
			$length--;
		}
		$max = strlen($seed) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $seed{mt_rand(0, $max)};
		}
		return $hash;
	}
}
