<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model,'name'); ?>
<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>128)); ?>
<?php 
if (!$model->isNewRecord && !empty($model->img)) {
	echo '<div class="control-group "><label class="control-label" for="link_img">预览</label><div class="controls">'.CHtml::image($model->img).'</div></div>';
}
?>
<?php echo $form->fileFieldRow($model, 'img'); ?>
<?php echo $form->dropDownListRow($model,'target',Lookup::items('LinkTarget')); ?>
<?php echo $form->dropDownListRow($model,'type',Lookup::items('LinkType')); ?>
<?php echo $form->textFieldRow($model,'position'); ?>
<?php echo $form->dropDownListRow($model,'visible',Lookup::items('LinkVisible')); ?>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
</div>

<?php $this->endWidget(); ?>
