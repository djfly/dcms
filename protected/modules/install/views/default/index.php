<?php
/* @var $this DefaultController */

?>
<div class="span3"></div>
<div class="span6">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<br />
 <fieldset><legend>DCMS <small><?php echo CHtml::encode(Yii::app()->params['dcmsVersion']); ?> Release <?php echo CHtml::encode(Yii::app()->params['releaseDate']); ?></small>
</legend>
	<?php echo $form->errorSummary($model); ?>
	<h5>填写数据库信息</h5>
		<?php echo $form->textFieldRow($model,'dbHost'); ?>
		<?php echo $form->textFieldRow($model,'dbName'); ?>
		<?php echo $form->textFieldRow($model,'dbUser'); ?>
		<?php echo $form->textFieldRow($model,'dbPassword'); ?>
		<?php echo $form->textFieldRow($model,'tablepre'); ?>
	<br />
	<h5>填写创始人信息</h5>
		<?php echo $form->textFieldRow($model,'username'); ?>
		<?php echo $form->passwordFieldRow($model,'password',array('hint'=>'默认 admin')); ?> 
		<?php echo $form->passwordFieldRow($model,'password2'); ?>
		<?php echo $form->textFieldRow($model,'email'); ?>
	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'安装DCMS')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->