<?php
/* @var $this ThumbnailsFormController */
/* @var $model ThumbnailsForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'访问控制'=>array('thumbnails'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>

<?php echo $form->radioButtonListRow($model, 'imageLib',array('0'=>'GD','1'=>'ImageMagick')); ?>
<?php echo $form->textFieldRow($model,'imageMagickPath',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'ImageMagick 程序的安装路径。如果服务器的操作系统为 Windows，路径不要使用长文件名')); ?>
<?php echo $form->textFieldRow($model,'maxThumbWidth',$htmlOptions=array('class'=>'input-small','data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'缩略图宽（单位像素）'));?>
<?php echo $form->textFieldRow($model,'maxThumbHeight',$htmlOptions=array('class'=>'input-small','data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'缩略图高（单位像素）')); ?>
<?php echo $form->radioButtonListRow($model, 'thumbStatus',array('0'=>'不启用','1'=>'小于指定大小、保持比率','2'=>'与指定大小相同、保持比率，超出部分剪切')); ?>
<?php echo $form->textFieldRow($model,'thumbQuality',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'设置图片附件缩略图的质量参数，范围为 0～100 的整数，数值越大结果图片效果越好，但尺寸也越大')); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
</div>
<?php $this->endWidget(); ?>
<!-- form -->
