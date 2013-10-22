<?php

class FtpForm extends CFormModel
{
	public $ftpOn;
	public $ssl;
	public $host;
	public $port=21;
	public $username;
	public $password;
	public $pasv;
	public $attachDir;
	public $attachUrl;
	public $timeout=90;
	public function rules()
	{
		return array(
			array('ftpOn,ssl,pasv', 'boolean'),
			array('port,timeout', 'numerical', 'integerOnly'=>true),
			array('host,username,password,attachDir,attachUrl','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'ftpOn'=>'启用远程附件',
			'ssl'=>'启用 SSL 连接',
			'host'=>'FTP 服务器地址',
			'port'=>'FTP 服务器端口',
			'username'=>'FTP 帐号',
			'password'=>'FTP 密码',
			'pasv'=>'被动模式(pasv)连接',
			'attachDir'=>'远程附件目录',
			'attachUrl'=>'远程访问 URL',
			'timeout'=>'FTP 传输超时时间',
		);
	}
}
