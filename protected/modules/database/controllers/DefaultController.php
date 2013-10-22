<?php
/**
 * database
 *
 * Yii module to view,optimize,repair table and backup, restore databse
 *
 * @version 1.0
 */
class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='application.modules.admin.views.layouts.column2';

	public $menu = array(
	    // array('label' => '数据库概览', 'icon' => 'th', 'url' => array('/database/default/index')),
	    array('label' => '数据库备份', 'icon' => 'hdd', 'url' => array('/database/default/index')),
	    array('label' => '数据库恢复', 'icon' => 'repeat', 'url' => array('/database/default/List')),
		// array('label' => '数据表优化', 'icon' => 'table', 'url' => array('/database/default/optimize')),
		array('label' => '执行SQL语句', 'icon' => 'terminal', 'url' => array('/database/default/execsql')),
	);
	public $tables = array();
	public $fp ;
	public $file_name;
	public $_path = null;
	public $back_temp_file = 'db_backup_';

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
						'actions'=>array('create1'),
						'users'=>array('*'),
		),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array(),
						'users'=>array('@'),
		), 
		array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete','index','backup','upload', 'download','restore','optimize','repair','execsql','showtable','list'),
						'users'=>array('admin'),
		),
		array('deny',  // deny all users
						'users'=>array('*'),
		),
		);
	}
	public function actionIndex()
	{
		$tableData = Yii::app()->db->createCommand('SHOW TABLE STATUS')->queryAll();
		$gridDataProvider = new CArrayDataProvider($tableData, array('keyField'=>'Name'));
		$gridColumns = array(
			array(
				'name'=>'Name', 
				'header'=>'表名',
				'class'=>'bootstrap.widgets.TbRelationalColumn',
				'url' => $this->createUrl('default/showtable'),
				//'afterAjaxUpdate' => 'js:function(tr,rowid,data){console.log(values);}',
				'htmlOptions'=>array('style'=>'width: 260px'
					)),
			array('name'=>'Engine', 'header'=>'类型'),
			array('name'=>'Collation', 'header'=>'编码'),
			array('name'=>'Rows', 'header'=>'记录数', 'class'=>'bootstrap.widgets.TbTotalSumColumn'),
			array('name'=>'Data_length', 'header'=>'大小', 'class'=>'bootstrap.widgets.TbTotalSumColumn'),
			array('name'=>'Index_length', 'header'=>'索引', 'class'=>'bootstrap.widgets.TbTotalSumColumn'),
			array('name'=>'Data_free', 'header'=>'剩余', 'class'=>'bootstrap.widgets.TbTotalSumColumn'),
			array('name'=>'Comment', 'header'=>'注释','footer'=>'总计'),
		);								
		$this->render('index',array('gridDataProvider'=>$gridDataProvider,'gridColumns'=>$gridColumns));
	}
	public function execSQL($sql)
	{
		$message = "ok";
		$cmd = Yii::app()->db->createCommand($sql);
		try	{
			$cmd->execute();
		}
		catch(CDbException $e)
		{
			$message = $e->getMessage();
		}
		return $message;
	}

	public function actionOptimize($table)
	{
		$table=explode(',', $table);
		$sql="";
		foreach ($table as $key => $value) {
			$sql.='OPTIMIZE TABLE '.$value.';';
		}
		if($this->execSQL($sql)=="ok"){
			Yii::app()->user->setFlash('success', "优化成功！");
			$this->redirect(array('index'));
		}else{
			Yii::app()->user->setFlash('error', "优化失败！<br>".$message);
			$this->redirect(array('index'));
		}
		
	}

	public function actionRepair($table)
	{
		$table=explode(',', $table);
		$sql="";
		foreach ($table as $key => $value) {
			$sql.='REPAIR TABLE '.$value.';';
		}
		if($this->execSQL($sql)=="ok"){
			Yii::app()->user->setFlash('success', "修复成功！");
			$this->redirect(array('index'));
		}else{
			Yii::app()->user->setFlash('error', "修复失败！<br>".$message);
			$this->redirect(array('index'));
		}
	}

	public function actionExecSQL()
	{
		$model=new ExecSQLForm;
		if(isset($_POST['ExecSQLForm']))
		{
			$model->attributes=$_POST['ExecSQLForm'];
			if($this->execSQL($model->sql)=="ok"){
				Yii::app()->user->setFlash('success', "执行成功！");
				$this->redirect(array('execsql'));
			}else{
				Yii::app()->user->setFlash('error', "执行失败！<br>".$message);
				$this->redirect(array('execsql'));
			}
		}
		$this->render('execsql',array('model'=>$model));
	}

	public function actionShowTable($id)
	{
		$tableData = Yii::app()->db->createCommand('SHOW COLUMNS FROM '.$id)->queryAll();
		$gridDataProvider = new CArrayDataProvider($tableData, array('keyField'=>'Field'));
		$gridColumns = array(
			array('name'=>'Field', 'header'=>'名字'),
			array('name'=>'Type', 'header'=>'类型'),
			array('name'=>'Null', 'header'=>'空'),
			array('name'=>'Key', 'header'=>'属性'),
			array('name'=>'Default', 'header'=>'默认'),
			array('name'=>'Extra', 'header'=>'额外'),
		);
		$this->renderPartial('_tableColumns', array(
			'id' => $id,
			'gridDataProvider' => $gridDataProvider,
			'gridColumns' => $gridColumns,
		));
	}

	public function actionList()
	{
		$path = $this->path;
		
		$dataArray = array();
		
		$list_files = glob($path .'*.sql');
		if ($list_files )
		{
			$list = array_map('basename',$list_files);
			sort($list);

	
			foreach ( $list as $id=>$filename )
			{
				$columns = array();
				$columns['id'] = $id;
				$columns['name'] = basename ( $filename);
				$columns['size'] = floor(filesize ( $path. $filename)/ 1024) .' KB';
				$columns['create_time'] = date("Y-m-d H:i:s", filectime($path .$filename) );
				$dataArray[] = $columns;
			}
		}
		$dataProvider = new CArrayDataProvider($dataArray);
		$this->render('restore', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionBackup($table = null)
	{
		if (isset($table)) {
			$tables = explode(',', $table);
		}else{
			$tables = $this->getTables();
		}

		if(!$this->StartBackup())
		{
			//render error
			$this->render('create');
			return;
		}

		foreach($tables as $tableName)
		{
			$this->getColumns($tableName);
		}
		foreach($tables as $tableName)
		{
			$this->getData($tableName);
		}
		$this->EndBackup();
		Yii::app()->user->setFlash('success', "备份成功！");
		$this->redirect(array('index'));
	}

	public function actionRestore($file = null)
	{
		//$this->updateMenuItems();
		$message = 'OK. Done';
		$sqlFile = $this->path . 'install.sql';
		if ( isset($file))
		{
			$sqlFile = $this->path . basename($file);
		}

		$this->execSqlFile($sqlFile);
		$this->render('restore',array('error'=>$message));
	}

	public function actionDelete($file = null)
	{
		//$this->updateMenuItems();
		if ( isset($file))
		{
			$sqlFile = $this->path . basename($file);
			if ( file_exists($sqlFile))
			unlink($sqlFile);
		}
		else throw new CHttpException(404, Yii::t('app', 'File not found'));
		$this->actionIndex();
	}

	public function actionDownload($file = null)
	{
		//$this->updateMenuItems();
		if ( isset($file))
		{
			$sqlFile = $this->path . basename($file);
			if ( file_exists($sqlFile))
			{
				$request = Yii::app()->getRequest();
				$request->sendFile(basename($sqlFile),file_get_contents($sqlFile));
			}
		}
		throw new CHttpException(404, Yii::t('app', 'File not found'));
	}

	protected function getPath()
	{
		if ( isset ($this->module->path )) $this->_path = $this->module->path;
		else $this->_path = Yii::app()->basePath .'/../_backup/';

		if ( !file_exists($this->_path ))
		{
			mkdir($this->_path );
			chmod($this->_path, '777');
		}
		return $this->_path;
	}

	public function execSqlFile($sqlFile)
	{
		$message = "ok";

		if ( file_exists($sqlFile))
		{
			$sqlArray = file_get_contents($sqlFile);

			$cmd = Yii::app()->db->createCommand($sqlArray);
			try	{
				$cmd->execute();
			}
			catch(CDbException $e)
			{
				$message = $e->getMessage();
			}

		}
		return $message;
	}
	public function getColumns($tableName)
	{
		$sql = 'SHOW CREATE TABLE '.$tableName;
		$cmd = Yii::app()->db->createCommand($sql);
		$table = $cmd->queryRow();

		$create_query = $table['Create Table'] . ';';

		$create_query  = preg_replace('/^CREATE TABLE/', 'CREATE TABLE IF NOT EXISTS', $create_query);
		//$create_query = preg_replace('/AUTO_INCREMENT\s*=\s*([0-9])+/', '', $create_query);
		if ( $this->fp)
		{
			$this->writeComment('TABLE `'. addslashes ($tableName) .'`');
			$final = 'DROP TABLE IF EXISTS `' .addslashes($tableName) . '`;'.PHP_EOL. $create_query .PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		}
		else
		{
			$this->tables[$tableName]['create'] = $create_query;
			return $create_query;
		}
	}

	public function getData($tableName)
	{
		$sql = 'SELECT * FROM '.$tableName;
		$cmd = Yii::app()->db->createCommand($sql);
		$dataReader = $cmd->query();

		$data_string = '';

		foreach($dataReader as $data)
		{
			$itemNames = array_keys($data);
			$itemNames = array_map("addslashes", $itemNames);
			$items = join('`,`', $itemNames);
			$itemValues = array_values($data);
			$itemValues = array_map("addslashes", $itemValues);
			$valueString = join("','", $itemValues);
			$valueString = "('" . $valueString . "'),";
			$values ="\n" . $valueString;
			if ($values != "")
			{
				$data_string .= "INSERT INTO `$tableName` (`$items`) VALUES" . rtrim($values, ",") . ";" . PHP_EOL;
			}
		}

		if ( $data_string == '')
		return null;
			
		if ( $this->fp)
		{
			$this->writeComment('TABLE DATA '.$tableName);
			$final = $data_string.PHP_EOL.PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		}
		else
		{
			$this->tables[$tableName]['data'] = $data_string;
			return $data_string;
		}
	}

	public function getTables($dbName = null)
	{
		$sql = 'SHOW TABLES';
		$cmd = Yii::app()->db->createCommand($sql);
		$tables = $cmd->queryColumn();
		return $tables;
	}

	public function StartBackup($addcheck = true)
	{
		$this->file_name =  $this->path . $this->back_temp_file . date('Y.m.d_H.i.s') . '.sql';

		$this->fp = fopen( $this->file_name, 'w+');

		if ( $this->fp == null )
		return false;
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		if ( $addcheck )
		{
			fwrite ( $this->fp,  'SET AUTOCOMMIT=0;' .PHP_EOL );
			fwrite ( $this->fp,  'START TRANSACTION;' .PHP_EOL );
			fwrite ( $this->fp,  'SET SQL_QUOTE_SHOW_CREATE = 1;'  .PHP_EOL );
		}
		fwrite ( $this->fp, 'SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, 'SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('START BACKUP');
		return true;
	}

	public function EndBackup($addcheck = true)
	{
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, 'SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;'.PHP_EOL );
		fwrite ( $this->fp, 'SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;'.PHP_EOL );

		if ( $addcheck )
		{
			fwrite ( $this->fp,  'COMMIT;' .PHP_EOL );
		}
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('END BACKUP');
		fclose($this->fp);
		$this->fp = null;
	}

	public function writeComment($string)
	{
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, '-- '.$string .PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
	}
}