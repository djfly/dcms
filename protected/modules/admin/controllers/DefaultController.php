<?php

class DefaultController extends Controller
{
	
	public $layout = '/layouts/column2';
	
	public $menu = array(
	    array('label' => '站点信息', 'icon' => 'th-large', 'url' => array('/admin/default/siteinfo')),
	    array('label' => '访问控制', 'icon' => 'minus-sign', 'url' => array('/admin/default/access')),
	    array('label' => '注册设置', 'icon' => 'user', 'url' => array('/admin/default/reg')),
		array('label' => '附件设置', 'icon' => 'paper-clip', 'url' => array('/admin/default/attach')),
		array('label' => '缩略图设置', 'icon' => 'picture', 'url' => array('/admin/default/thumbnails')),
	    array('label' => '水印设置', 'icon' => 'tint', 'url' => array('/admin/default/watermark')),
	    array('label' => '邮件设置', 'icon' => 'envelope', 'url' => array('/admin/default/email')),
	);
	/**
	* @return array action filters
	*/
	public function filters()
	{
	  return array(
		'accessControl',
		array('auth.filters.AuthFilter'),
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
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','siteinfo','access','index','reg','attach','thumbnails','watermark','email'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionSiteInfo()
	{
		$model=new InfoForm;
		$model->attributes=Yii::app()->config->get("siteInfo");
		if(isset($_POST['InfoForm']))
	    {
	        $model->attributes=$_POST['InfoForm'];
	        if($model->validate())
	        {
	           	Yii::app()->config->set("siteInfo",$model->attributes);
	           	//创建配置文件
				$file=Yii::app()->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'siteinfo.php';
				touch($file);
				$config = <<<EOT
<?php
return array(
	'siteName' => '$model->siteName',
	'siteUrl' => '$model->siteUrl',
	'siteKeyword' => '$model->siteKeyword',
	'siteDescription' => '$model->siteDescription',
	'adminEmail' => '$model->adminEmail',
	'siteCopyright' => '$model->siteCopyright',
	'siteIcp' => '$model->siteIcp',
	'statCode' => '$model->statCode',
	'closed' => '$model->closed',
);
EOT;

				if($fp = fopen($file, 'w')) {
					fwrite($fp, $config);
					fclose($fp);
				}
				Yii::app()->user->setFlash('success', "保存成功！");
				$this->refresh();
	        }
	    }
		$this->render('info',array('model'=>$model));
	}

	public function actionAccess()
	{
		$model=new AccessForm;
		$model->ipAccess=Yii::app()->config->get("ipAccess");
		$model->ipAdminAccess=Yii::app()->config->get("ipAdminAccess");
		if(isset($_POST['AccessForm']))
	    {
			$model->attributes=$_POST['AccessForm'];
	        if($model->validate())
	        {
	        	$model->ipAccess=trim(preg_replace("/(\s*(\r\n|\n\r|\n|\r)\s*)/", "\r\n", $model->ipAccess));
	        	$model->ipAdminAccess=trim(preg_replace("/(\s*(\r\n|\n\r|\n|\r)\s*)/", "\r\n", $model->ipAdminAccess));

        		//检测是否将自己的ip加入列表
        		if(!empty($model->ipAccess)&&!AccessForm::allowIp(Yii::app()->request->userHostAddress,explode("\r\n",$model->ipAccess))){
						Yii::app()->user->setFlash('warning', "您必须将自己的 IP 加入到允许访问站点的 IP 列表中！");
						$this->redirect(array('access'));
        		}
        		if(!empty($model->ipAdminAccess)&&!AccessForm::allowIp(Yii::app()->request->userHostAddress,explode("\r\n",$model->ipAdminAccess))){
						Yii::app()->user->setFlash('warning', "您必须将自己的 IP 加入到允许访问后台的 IP 列表中！");
						$this->redirect(array('access'));
        		}
        		//保存到数据库
	        	Yii::app()->config->set("ipAccess",$model->ipAccess);
	        	Yii::app()->config->set("ipAdminAccess",$model->ipAdminAccess);
	        	//创建配置文件

				$file=Yii::app()->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'ipaccess.php';
				touch($file);
				$config = <<<EOT
<?php
return array(
	'ipAdminAccess' => '$model->ipAdminAccess',
	'ipAccess' => '$model->ipAccess'
);
EOT;

				if($fp = fopen($file, 'w')) {
					fwrite($fp, $config);
					fclose($fp);
				}
				Yii::app()->user->setFlash('success', "保存成功！");
				$this->refresh();
	        }
		}
		$this->render('access',array('model'=>$model));
	}

	public function actionReg()
	{
		$model=new RegForm;
		$model->attributes=Yii::app()->config->get("reg");
		if(isset($_POST['RegForm']))
	    {
	    	$model->attributes=$_POST['RegForm'];
	        if($model->validate())
	        {
	           	Yii::app()->config->set("reg",$model->attributes);
	           	Yii::app()->user->setFlash('success', "保存成功！");
	           	$this->refresh();
	        }
	    }
		$this->render('reg',array('model'=>$model));
	}

	public function actionAttach()
	{
		$model=new AttachForm;
		$model->attachType=Yii::app()->config->get("attach");
		if(isset($_POST['AttachForm']))
	    {
	    	$model->attributes=$_POST['AttachForm'];
	        if($model->validate())
	        {
	        	$model->attachType=array_filter(array_flip(array_filter(array_combine($model->maxSize, $model->extension))));
	        	Yii::app()->config->set("attach",$model->attachType);
	        }
	    }
	    $modelFtp=new FtpForm;
		$modelFtp->attributes=Yii::app()->config->get("ftp");
		if(isset($_POST['FtpForm']))
	    {
	    	$modelFtp->attributes=$_POST['FtpForm'];
	        if($modelFtp->validate())
	        {
	        	Yii::app()->config->set("ftp",$modelFtp->attributes);
	           	Yii::app()->user->setFlash('success', "保存成功！");
	           	$this->refresh();
	        }
	    }
		$this->render('attach',array('model'=>$model,'modelFtp'=>$modelFtp));
	}

	public function actionThumbnails()
	{
		$model=new ThumbnailsForm;
		$model->attributes=Yii::app()->config->get("thumbnails");
		if(isset($_POST['ThumbnailsForm']))
	    {
	    	$model->attributes=$_POST['ThumbnailsForm'];
	        if($model->validate())
	        {
	           	Yii::app()->config->set("thumbnails",$model->attributes);
	           	Yii::app()->user->setFlash('success', "保存成功！");
	           	$this->refresh();
	        }
	    }
		$this->render('thumbnails',array('model'=>$model));
	}

	public function actionWaterMark()
	{
		$model=new WaterMarkForm;
		$model->attributes=Yii::app()->config->get("watermark");
		if(isset($_POST['WaterMarkForm']))
	    {
	    	$model->attributes=$_POST['WaterMarkForm'];
	        if($model->validate())
	        {
	           	Yii::app()->config->set("watermark",$model->attributes);
	           	Yii::app()->user->setFlash('success', "保存成功！");
	           	$this->refresh();
	        }
	    }
		$this->render('watermark',array('model'=>$model));
	}

	public function actionEmail()
	{
		$model=new EmailForm;
		//邮件发送测试ajax方式
		if(Yii::app()->request->isAjaxRequest || isset($_POST['ajax']))
		{
			$model->attributes=$_POST['EmailForm'];
			$mail = new YiiMailer();
			$mail->setView('contact');
			$mail->setData(array('message' => '邮件正文内容', 'name' => 'John Doe', 'description' => 'Contact form'));
			if ($model->mailSendWay) {
				$mail->IsSMTP();// Set mailer to use SMTP
			}
			$mail->Host = $model->host; 
			$mail->Port = $model->port;
			$mail->SMTPAuth = true;// Enable SMTP authentication
			$mail->Username = $model->username;// SMTP username
			$mail->Password = $model->password;// SMTP password
			//$mail->SMTPSecure = 'tls';    
			$mail->setFrom($model->testForm, 'testForm');
			$mail->setSubject("我测试一下下！");
			$mail->setTo($model->testTo);
			if ($mail->send()) {
				echo "发送成功";
			} else {
				echo "发送失败";
			}
			Yii::app()->end();
		}

		//邮件保存
		$model->attributes=Yii::app()->config->get("email");
		if(isset($_POST['EmailForm']))
	    {
	    	$model->attributes=$_POST['EmailForm'];
	        if($model->validate())
	        {
	           	Yii::app()->config->set("email",$model->attributes);
	           	Yii::app()->user->setFlash('success', "保存成功！");
	        }
	    }
		$this->render('email',array('model'=>$model));
	}
}