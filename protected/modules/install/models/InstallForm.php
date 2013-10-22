<?php

class InstallForm extends CFormModel
{
	
	public $dbHost;	
	public $dbName;
	public $dbUser;
	public $dbPassword;
	public $tablepre;

	public $username;		
	public $password;
	public $password2;		
	public $email;		

	public function rules()
	{
		return array(
			array('dbHost,dbName,dbUser,tablepre,email,
				username,password,password2
				', 'required'),	
			array('email', 'email'),
			array('password2', 'compare', 'compareAttribute'=>'password'),		
		);
	}

	public function attributeLabels()
	{
		return array(
			'dbHost'=>'数据库服务器',
			'dbName'=>'数据库名',
			'dbUser'=>'数据库用户名',
			'dbPassword'=>'数据库密码',
			'tablepre'=>'数据表前缀',
			'username'=>'创始人帐号',
			'password'=>'创始人密码',
			'password2'=>'重复密码',
			'email'=>'管理员邮箱',
		);
	}
	
}
