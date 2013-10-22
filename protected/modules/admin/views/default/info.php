<?php
/* @var $this InfoFormController */
/* @var $model InfoForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'站点信息'=>array('siteinfo'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model,'siteName'); ?>
<?php echo $form->textFieldRow($model,'siteUrl'); ?>
<?php echo $form->textFieldRow($model,'siteTitle'); ?>
<?php echo $form->textFieldRow($model,'siteKeyword'); ?>
<?php echo $form->textAreaRow($model,'siteDescription',$htmlOptions=array('rows'=>4,'clos'=>50)); ?>
<?php echo $form->textFieldRow($model,'adminEmail'); ?>
<?php echo $form->textAreaRow($model,'siteCopyright',$htmlOptions=array('rows'=>4,'clos'=>50)); ?>
<?php echo $form->textFieldRow($model,'siteIcp'); ?>
<?php echo $form->textAreaRow($model,'statCode',$htmlOptions=array('rows'=>4,'clos'=>50)); ?>
<?php echo $form->toggleButtonRow($model, 'closed',array('hint'=>'<small>暂时将站点关闭，其他人无法访问，但不影响管理员访问</small>')); ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
</div>
<?php $this->endWidget(); ?>
<!-- form -->



