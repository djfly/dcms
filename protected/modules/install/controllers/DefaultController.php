<?php

class DefaultController extends Controller
{
	public $layout = '/layouts/column1';
	public function actionIndex()
	{
		//重复安装检测
		if(file_exists(Yii::app()->basePath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'install.lock')){			
			throw new CHttpException('安装锁定，已经安装过了，如果您确定要重新安装，请到服务器上删除 <br>./protected/data/install.lock <br>您必须解决以上问题，安装才可以继续');
		}

		//简单环境检测
		if(!version_compare(PHP_VERSION,"5.1.0",">=")) throw new CHttpException("php版本过低，DCMS最低要求php5.1.0，您的php版本是".PHP_VERSION);
		if(!extension_loaded('pdo_mysql')) throw new CHttpException("PDO MySQL扩展模块是必须的！");
		if(!extension_loaded('gd')) throw new CHttpException("GD 扩展模块是必须的！");
		if(!ini_get('file_uploads')) throw new CHttpException("文件上传是必须的");

		//目录读写检测
		$basePath=dirname(Yii::app()->BasePath);
		$dir=array(
			$basePath,
			$basePath.DIRECTORY_SEPARATOR.'assets',
			$basePath.DIRECTORY_SEPARATOR.'files',
			$basePath.DIRECTORY_SEPARATOR.'upload',
			$basePath.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'runtime',
			$basePath.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'data',
			$basePath.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'config'
		);
		$writeable=array();
		foreach ($dir as $key => $value) {
			if(is_dir($value)) {
				if($fp = @fopen($value.DIRECTORY_SEPARATOR."test.txt", 'w')) {
					@fclose($fp);
					@unlink($value.DIRECTORY_SEPARATOR."test.txt");
				} else {
					$writeable[] = $value;
				}
			}
		}
		if (!empty($writeable)) throw new CHttpException('<br>以下目录没有读写权限<br>'.implode('<br>',$writeable));
		
		//表单默认
		$model=new InstallForm;
		$model->dbHost='127.0.0.1';
		$model->dbName='dcms';						
		$model->dbUser='root';
		$model->tablepre='pre_';
		$model->username='admin';
		$model->password='admin';
		$model->password2='admin';
		$model->email='admin@localhost.com';
		
		if(isset($_POST['InstallForm'])){
			$model->attributes=$_POST['InstallForm'];
			$sql = file_get_contents(Yii::app()->basePath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'dcms.sql', true);
			if($sql){
				//创建数据库，假如该库不存在
				$createdb="CREATE DATABASE IF NOT EXISTS `".$model->dbName."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
				$connectionString='mysql:host='.$model->dbHost;
				$connection=new CDbConnection($connectionString,$model->dbUser,$model->dbPassword);
				$command=$connection->createCommand($createdb);
				if($command->execute()!==false){
					//替换表前缀，创建表
					$sql =str_replace('pre_',$model->tablepre, $sql);
					$connectionString='mysql:host='.$model->dbHost.';dbname='.$model->dbName;
					$connection=new CDbConnection($connectionString,$model->dbUser,$model->dbPassword);
					$command=$connection->createCommand($sql);
					if($command->execute()!==false){
						$command=$connection->createCommand("INSERT INTO ".$model->tablepre."user (username, password, email) VALUES (:c, :k, :v)");
						$command->bindValue(':c',$model->username,PDO::PARAM_STR);
						$command->bindValue(':k',$model->password,PDO::PARAM_STR);
						$command->bindValue(':v',$model->email,PDO::PARAM_STR);
						$command->execute();
						//创建数据库配置文件
						$file=Yii::app()->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'dbconfig.php';
						$config = <<<EOT
<?php
return array(
    'dbHost' => '$model->dbHost',
    'dbName' => '$model->dbName',
    'dbUser' => '$model->dbUser',
    'dbPassword' => '$model->dbPassword',
    'tablePrefix' => '$model->tablepre',
);
EOT;

						if($fp = fopen($file, 'w')) {
							fwrite($fp, $config);
							fclose($fp);
						}
						touch(Yii::app()->basePath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'install.lock');
						$this->redirect(array('default/success'));
					}
				}
			}
		}
		$this->render('index',array('model'=>$model));
	}
	public function actionSuccess()
	{
		$this->render('Success');
	}
}