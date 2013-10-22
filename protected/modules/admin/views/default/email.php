<?php
/* @var $this EmailFormController */
/* @var $model EmailForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'邮件设置'=>array('email'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'email-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>
<ul id="myTab" class="nav nav-tabs">
	<li class="active"><a href="#mail" data-toggle="tab">设置</a></li>
	<li><a href="#check" data-toggle="tab">检测</a></li>
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="mail">	
		<?php echo $form->radioButtonListRow($model, 'mailSendWay',array('0'=>'通过 PHP 函数的 sendmail 发送(推荐此方式)','1'=>'通过 SOCKET 连接 SMTP 服务器发送(支持 ESMTP 验证)')); ?>
		<?php echo $form->textFieldRow($model,'host'); ?>
		<?php echo $form->textFieldRow($model,'port'); ?>
		<?php echo $form->toggleButtonRow($model,'auth'); ?>
		<?php echo $form->textFieldRow($model,'from'); ?>
		<?php echo $form->textFieldRow($model,'username'); ?>
		<?php echo $form->textFieldRow($model,'password'); ?>
		<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
		</div>
	</div>
	<div class="tab-pane fade" id="check">
		<?php echo $form->errorSummary($model); ?>
		<?php echo $form->textFieldRow($model,'testForm',$htmlOptions=array('rows'=>4,'clos'=>50,'data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'请输入发件人email')); ?>
		<?php echo $form->textFieldRow($model,'testTo',$htmlOptions=array('rows'=>4,'clos'=>50,'data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'请输入收件人email')); ?>	
		<div class="control-group">
		<div class="controls">
			<?php echo  CHtml::ajaxSubmitButton('检测邮件发送设置',
			CHtml::normalizeUrl(array('default/email')),
			array(             
				'beforeSend'=>'function(){
					//$(".btn").attr({ data-loading-text: "正在加载"});
				}',
				'success'=>'function(data){
					alert(data);
				}',
			),
			array('class'=>'btn')
			); ?> 
		</div>
		</div>
	</div>
</div>
<div id="qq"></div>
<?php $this->endWidget(); ?>

<!-- form -->
