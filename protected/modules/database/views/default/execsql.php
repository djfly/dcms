<?php
/* @var $this ExecSQLFormController */
/* @var $model ExecSQLForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'执行SQL语句'=>array('execsql'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>
<p><span class="label label-info">提示:</span> 每条语句以";"结束，自动附加数据表前缀可用：“{{表名}}"表示</p>
<?php echo $form->textAreaRow($model,'sql',$htmlOptions=array('rows'=>8,'clos'=>180,'style'=>'width:400px;')); ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
</div>
<?php $this->endWidget(); ?>
<!-- form -->
