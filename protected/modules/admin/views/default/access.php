<?php
/* @var $this AccessFormController */
/* @var $model AccessForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'访问控制'=>array('access'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>

<?php echo $form->textAreaRow($model,'ipAccess',$htmlOptions=array('rows'=>4,'clos'=>50,'data-toggle'=>'popover','data-placement'=>'right','data-html'=>'true','data-trigger'=>'focus','data-content'=>'<small><span class="label label-important">谨慎</span> 只有当用户处于本列表中的 IP 地址时才可以访问本站点，列表以外的地址访问将视为 IP 被禁止。每个 IP 一行，既可输入完整地址，也可以是一个含有通配符的地址，例如 "192.168.*"(不含引号) 可匹配 192.168.0.0～192.168.255.255 范围内的所有地址，留空为所有 IP 除明确禁止的以外均可访问<br><p class="text-info">当前ip：'.Yii::app()->request->userHostAddress.'</p></small>')); ?>
<?php echo $form->textAreaRow($model,'ipAdminAccess',$htmlOptions=array('rows'=>4,'clos'=>50,'data-toggle'=>'popover','data-placement'=>'right','data-html'=>'true','data-trigger'=>'focus','data-content'=>'<small><span class="label label-important">谨慎</span> 只有当用户处于本列表中的 IP 地址时才可以访问站点管理中心，列表以外的地址访问将无法访问，但仍可访问站点前端用户界面。每个 IP 一行，既可输入完整地址，也可以是一个含有通配符的地址，例如 "192.168.*"(不含引号) 可匹配 192.168.0.0～192.168.255.255 范围内的所有地址，留空为所有 IP 除明确禁止的以外均可访问管理中心<br><p class="text-info">当前ip：'.Yii::app()->request->userHostAddress.'</p></small>')); ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
</div>
<?php $this->endWidget(); ?>
<!-- form -->
