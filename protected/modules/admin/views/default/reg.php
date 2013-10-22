<?php
/* @var $this RegFormController */
/* @var $model RegForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'注册设置'=>array('reg'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>

<?php echo $form->toggleButtonRow($model, 'regStatus'); ?>
<?php echo $form->textAreaRow($model,'regCloseMessage',$htmlOptions=array('rows'=>4,'clos'=>50)); ?>
<?php echo $form->toggleButtonRow($model, 'sendRegUrl',array('hint'=>'<small class="muted">开启后系统会发一条注册的地址到用户的邮箱，从该地址链接过来的允许注册，<br><span class="label label-info">注意:</span>只有在系统 - 邮件设置中完成邮件设置，确保邮件能发送成功下可以开启该功能</small>')); ?>
<?php echo $form->textAreaRow($model,'censorUser',$htmlOptions=array('rows'=>4,'clos'=>50,'data-toggle'=>'popover','data-placement'=>'right','data-html'=>'true','data-trigger'=>'focus','data-content'=>'用户在其用户信息中无法使用这些关键字。每个关键字一行，可使用通配符 "*" 如 "*管理员*"(不含引号)')); ?>
<?php echo $form->textFieldRow($model,'pwLength',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'新用户注册时密码最小长度，0或不填为不限制')); ?>
<?php echo $form->radioButtonListRow($model,'regVerify', array('0'=>'无','1'=>'Email 验证', '2'=>'人工审核')); ?>
<?php echo $form->toggleButtonRow($model, 'welcomeMsg',array('hint'=>'<small class="muted">系统发送的欢迎信息的标题，不支持 HTML，不超过 75 字节。 <br><span class="label label-info">注意:</span>只有在系统 - 邮件设置中完成邮件设置，确保邮件能发送成功下可以开启该功能</small>')); ?>
<?php echo $form->textFieldRow($model,'welcomeMsgTitle',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-html'=>'true','data-trigger'=>'focus','data-content'=>'系统发送的欢迎信息的标题，不支持 HTML，不超过 75 字节。')); ?>
<?php echo $form->textAreaRow($model,'welcomeMsgTxt',$htmlOptions=array('rows'=>4,'clos'=>50,'data-toggle'=>'popover','data-placement'=>'right','data-html'=>'true','data-trigger'=>'focus','data-content'=>'系统发送的欢迎信息的内容。标题内容均支持变量替换，可以使用如下变量:
<br>{username} : 用户名
<br>{time} : 发送时间
<br>{sitename} : 网站名称（显示在页面底部的联系方式处的名称）
{adminemail} : 管理员 Email')); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
</div>
<?php $this->endWidget(); ?>
<!-- form -->
