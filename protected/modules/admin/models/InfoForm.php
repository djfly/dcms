<?php

class InfoForm extends CFormModel
{
	
	public $siteName;
	public $siteUrl;
	public $siteTitle;
	public $siteKeyword;
	public $siteDescription;
	public $adminEmail;
	public $siteCopyright;
	public $siteIcp;
	public $statCode;
	public $closed=0;

	public function rules()
	{
		return array(
			array('closed', 'boolean'),
			array('adminEmail', 'email'),
			array('siteName,siteUrl,siteTitle,siteKeyword,siteDescription,adminEmail,siteCopyright,siteIcp,statCode','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'siteName'=>'网站名称',
			'siteUrl'=>'网站URL',
			'siteTitle'=>'网站标题',
			'siteKeyword'=>'网站关键字',
			'siteDescription'=>'网站介绍',
			'adminEmail'=>'管理员邮箱',
			'siteCopyright'=>'网站版权',
			'siteIcp'=>'网站备案号',
			'statCode'=>'统计代码',
			'closed'=>'关闭网站',
		);
	}
	
}
