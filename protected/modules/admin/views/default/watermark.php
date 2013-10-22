<?php
/* @var $this ThumbnailsFormController */
/* @var $model ThumbnailsForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'水印设置'=>array('watermark'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>
<dl>
	<dt>说明</dt>
	<dd><small>如果设置 GIF 类型的文件作为水印，水印图片为 image/watermark.gif，</small></dd>
	<dd><small>如果设置 PNG 类型的文件作为水印，水印图片为 image/watermark.png，</small></dd>
	<dd><small>您可替换水印文件以实现不同的水印效果。如果设置文本类型的水印并且使用 GD 图片处理库，那么还需要 FreeType 库支持才能使用</small></dd>
</dl>
<?php echo $form->toggleButtonRow($model,'waterMarkOn'); ?>
<?php echo $form->radioButtonListInlineRow($model, 'waterMarkPosition',array('1'=>'左上','2'=>'上中','3'=>'右上','4'=>'左中','5'=>'正中','6'=>'右中','7'=>'左下','8'=>'下中','9'=>'右下')); ?>
<?php echo $form->radioButtonListRow($model, 'waterMarkType',array('0'=>'GIF 类型水印','1'=>'PNG 类型水印','2'=>'文本类型水印')); ?>
<?php echo $form->textFieldRow($model,'waterMarkTrans',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'设置 GIF 类型水印图片与原始图片的融合度，范围为 1～100 的整数，数值越大水印图片透明度越低。PNG 类型水印本身具有真彩透明效果，无须此设置。本功能需要开启水印功能后才有效', 'rel'=>'popover')); ?>
<?php echo $form->textFieldRow($model,'waterMarkQuality',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'设置 JPEG 类型的图片附件添加水印后的质量参数，范围为 0～100 的整数，数值越大结果图片效果越好，但尺寸也越大。本功能需要开启水印功能后才有效', 'rel'=>'popover')); ?>
<?php echo $form->textAreaRow($model,'waterMarkText',$htmlOptions=array('rows'=>4,'clos'=>50,'data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'如果您指定的 TrueType 字体为中文字体文件，那么您可以在水印中书写中文
', 'rel'=>'popover')); ?>
<?php echo $form->colorpickerRow($model,'waterMarkColor',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'输入 16 进制颜色代表文本水印阴影字体颜色', 'rel'=>'popover')); ?>
<?php echo $form->textFieldRow($model,'waterMarkSize',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'设置水印字体大小，请按照字体设置相应的大小', 'rel'=>'popover')); ?>
<div class="control-group">
	<div class="controls">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'default', 'label'=>'预览水印效果')); ?>
	</div>
	</div>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
</div>
<?php $this->endWidget(); ?>
<!-- form -->
