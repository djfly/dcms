<?php

class EmailForm extends CFormModel
{
	public $mailSendWay=0;
	public $host;
	public $port=25;
	public $auth=1;
	public $from;
	public $username;
	public $password;
	public $testForm;
	public $testTo;
	public function rules()
	{
		return array(
			array('testForm,testTo', 'email'),
			array('auth,mailSendWay', 'boolean'),
			array('port', 'numerical', 'integerOnly'=>true),
			array('host,from,username,password','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'mailSendWay'=>'邮件发送方式',
			'host'=>'SMTP 服务器',
			'port'=>'端口',
			'auth'=>'验证',
			'from'=>'发信人邮件地址',
			'username'=>'SMTP 身份验证用户名',
			'password'=>'SMTP 身份验证密码',
			'testForm'=>'测试发件人',
			'testTo'=>'测试收件人',
		);
	}
}
