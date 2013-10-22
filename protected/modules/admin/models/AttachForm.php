<?php

class AttachForm extends CFormModel
{
	public $attachType=array();
	public $extension;
	public $maxSize;
	public function rules()
	{
		return array(
			array('extension,maxSize','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'attachType'=>'附件类型',
			'extension'=>'后缀名(小写)',
			'maxSize'=>'最大尺寸(单位：KB)',
			
		);
	}
}
