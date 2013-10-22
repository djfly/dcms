<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>
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
		'buttonType' => 'submit',
		'type'=>'success',
		'label'=>'搜素',
	)); ?>
</div>

<?php $this->endWidget(); ?>
