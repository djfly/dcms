<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'upload-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model,'post_id',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'author_id',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'size',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'path',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
</div>

<?php $this->endWidget(); ?>
