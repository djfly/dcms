<?php

class ThumbnailsForm extends CFormModel
{
	public $imageLib=0;
	public $imageMagickPath;
	public $thumbSize;
	public $maxThumbWidth;
	public $maxThumbHeight;
	public $thumbStatus=0;
	public $thumbQuality;
	public function rules()
	{
		return array(
			array('imageLib', 'boolean'),
			array('thumbStatus', 'in', 'range'=>array(0,1,2)),
			array('thumbQuality,maxThumbWidth,maxThumbHeight', 'numerical', 'integerOnly'=>true),
			array('imageMagickPath','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'imageLib'=>'图片处理库类型',
			'imageMagickPath'=>'ImageMagick 程序安装路径',
			'thumbSize'=>'缩略图尺寸',
			'maxThumbWidth'=>'宽',
			'maxThumbHeight'=>'高',
			'thumbStatus'=>'缩略图比例',
			'thumbQuality'=>'缩略图质量',
			
		);
	}
}
