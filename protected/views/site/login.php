<div class="row" id="box">
	<div class="span3"></div>
	<div class="span6">
	<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	    'id'=>'login-form',
	    'type'=>'horizontal',
		'enableAjaxValidation'=>true, 
	)); ?>
	<?php echo $form->textFieldRow($model, 'username'); ?>
	<?php echo $form->passwordFieldRow($model, 'password'); ?>
	<div class="control-group ">
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<a href="<?php echo Yii::app()->createUrl('site/index'); ?>">→返回首页</a></div></div>
	<?php $this->endWidget(); ?>
	</div>
	<div class="span3"></div>
</div>