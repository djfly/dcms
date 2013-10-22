<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'category_id',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>128)); ?>
<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'author_id',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType' => 'submit',
		'type'=>'success',
		'label'=>'搜索',
	)); ?>
</div>

<?php $this->endWidget(); ?>
