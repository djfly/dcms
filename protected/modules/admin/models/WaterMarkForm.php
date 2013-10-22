<?php

class WaterMarkForm extends CFormModel
{
	public $waterMarkOn;
	public $waterMarkPosition;
	public $waterMarkType;
	public $waterMarkTrans;
	public $waterMarkQuality;

	public $waterMarkText;
	public $waterMarkSize;
	public $waterMarkColor;
	public function rules()
	{
		return array(
			array('waterMarkType', 'in', 'range'=>array(0,1,2)),
			array('waterMarkOn,waterMarkTrans,waterMarkQuality,waterMarkSize', 'numerical', 'integerOnly'=>true),
			array('waterMarkPosition,waterMarkText,waterMarkColor','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'waterMarkOn'=>'开启水印',
			'waterMarkPosition'=>'水印位置',
			'waterMarkType'=>'水印图片类型',
			'waterMarkTrans'=>'水印融合度',
			'waterMarkQuality'=>'JPEG 水印质量',
			'waterMarkText'=>'水印文字内容',
			'waterMarkSize'=>'水印字体大小',
			'waterMarkColor'=>'水印字体颜色',
		);
	}
}
