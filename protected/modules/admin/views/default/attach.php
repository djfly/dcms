<?php
/* @var $this AttachFormController */
/* @var $model AttachForm */
/* @var $modelFtp FtpForm */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'附件设置'=>array('access'),
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>

<ul id="myTab" class="nav nav-tabs">
	<li class="active"><a href="#attach" data-toggle="tab">附件类型</a></li>
	<li><a href="#ftp" data-toggle="tab">远程附件</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade in active" id="attach">
    <dl>
		<dt>技巧提示 </dt>
		<dd><small>本功能可限定某特定类型附件的最大尺寸，当这里设定的尺寸小于用户组允许的最大尺寸时，指定类型的附件尺寸限制将按本设定为准。</small></dd>
		<dd><small>您可以设置某类附件最大尺寸为 0 以整体禁止这类附件被上传。如果想删除设置只需清空输入框内容提交即可。</small></dd>
		<dd><small><span class="label label-info">注意:</span>当前服务器允许上传单个附件的最大值：<span class="text-error"><strong><?php echo @ini_get('file_uploads') ? ini_get('upload_max_filesize') : 'unknow'; ?></strong></span> (1M=1024KB) <a href="#">如何增大？</a></small></dd>
	</dl>

	<table class="table">
	<tr><th>后缀名(小写)</th><th>最大尺寸(单位：KB)</th><th width="60%"></th></tr>

	<?php foreach ($model->attachType as $extension => $maxSize) {
	?>
	<tr>
		<td><?php echo $form->textField($model,"extension[]",array('class'=>'input-small','value'=>$extension)); ?></td>
		<td><?php echo $form->textField($model,"maxSize[]",array('class'=>'input-small','value'=>$maxSize)); ?></td>
		<td width="60%"><?php echo $form->error($model,'extension'); ?><?php echo $form->error($model,'maxSize'); ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td><a onclick="addrow()" href="###"><i class="icon-plus-sign-alt muted"></i> 添加新附件类型</a></td>
		<td></td>
		<td width="60%"></td>
	</tr>
	</table>
	<script type="text/javascript">
	function addrow(){
	    $('.table tr:last').before('<tr><td><input class="input-small" value="" name="AttachForm[extension][]" id="AttachForm_extension" type="text" /></td><td><input class="input-small" value="" name="AttachForm[maxSize][]" id="AttachForm_maxSize" type="text" /></td><td width="60%"></td></tr>');
	}
	</script>
  </div>
  <div class="tab-pane fade" id="ftp">
    <?php echo $form->toggleButtonRow($modelFtp, 'ftpOn'); ?>
    <?php echo $form->toggleButtonRow($modelFtp, 'ssl'); ?>
    <?php echo $form->textFieldRow($modelFtp,'host',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'可以是 FTP 服务器的 IP 地址或域名')); ?>
    <?php echo $form->textFieldRow($modelFtp,'port',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'默认为 21')); ?>
    <?php echo $form->textFieldRow($modelFtp,'username',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'该帐号必需具有以下权限：读取文件、写入文件、删除文件、创建目录、子目录继承')); ?>
    <?php echo $form->textFieldRow($modelFtp,'password',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'基于安全考虑将只显示 FTP 密码的第一位和最后一位，中间显示八个 * 号')); ?>
    <?php echo $form->toggleButtonRow($modelFtp, 'pasv'); ?>
    <?php echo $form->textFieldRow($modelFtp,'attachDir',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'远程附件目录的绝对路径或相对于 FTP 主目录的相对路径，结尾不要加斜杠“/”，“.”表示 FTP 主目录')); ?>
    <?php echo $form->textFieldRow($modelFtp,'attachUrl',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'支持 HTTP 和 FTP 协议，结尾不要加斜杠“/”；如果使用 FTP 协议，FTP 服务器必需支持 PASV 模式，为了安全起见，使用 FTP 连接的帐号不要设置可写权限和列表权限')); ?>
    <?php echo $form->textFieldRow($modelFtp,'timeout',$htmlOptions=array('data-toggle'=>'popover','data-placement'=>'right','data-trigger'=>'focus','data-html'=>'true','data-content'=>'单位：秒，0 为服务器默认')); ?>
    <div class="control-group">
	<div class="controls">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'default', 'label'=>'测试FTP服务器')); ?>
	</div>
	</div>
  </div>
</div>

<div class="clearfix"></div>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'提交')); ?>
</div>
<?php $this->endWidget(); ?>
<!-- form -->
