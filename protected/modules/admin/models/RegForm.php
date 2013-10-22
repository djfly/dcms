<?php

class RegForm extends CFormModel
{
	public $regStatus=1;
	public $regCloseMessage;
	public $sendRegUrl=0;
	public $censorUser;
	public $pwLength;
	public $regVerify=0;
	public $welcomeMsg;
	public $welcomeMsgTitle="{username}，您好，感谢您的注册，请阅读以下内容。";
	public $welcomeMsgTxt="尊敬的{username}，您已经注册成为{sitename}的会员，请您在发表言论时，遵守当地法律法规。
如果您有什么疑问可以联系管理员，Email: {adminemail}。


{sitename}
{time}";
	public function rules()
	{
		return array(
			array('welcomeMsg,sendRegUrl,regStatus', 'boolean'),
			array('regVerify', 'in', 'range'=>array(0,1,2)),
			array('pwLength', 'numerical', 'integerOnly'=>true),
			array('regCloseMessage,censorUser,welcomeMsgTitle,welcomeMsgTxt','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'regStatus'=>'允许新用户注册 ',
			'regCloseMessage'=>'关闭注册提示信息',
			'sendRegUrl'=>'通过邮件发送注册链接',
			'censorUser'=>'用户信息保留关键字',
			'pwLength'=>'密码最小长度',
			'regVerify'=>'新用户注册验证',
			'welcomeMsg'=>'发送欢迎 Email',
			'welcomeMsgTitle'=>'欢迎信息标题',
			'welcomeMsgTxt'=>'欢迎信息内容',
			
		);
	}

}
