<?php
$this->breadcrumbs=array(
	'文件'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);
$this->menu=array(
array('label'=>'管理文件', 'icon'=>'file', 'url'=>array('admin')),
array('label'=>'创建文件', 'icon'=>'plus', 'url'=>array('create')),
array('label'=>'查看文件', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
array('label'=>'删除文件', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定要删除此项吗?')),
);
?>

	<h1>Update Upload <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>