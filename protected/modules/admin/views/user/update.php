<?php
$this->breadcrumbs=array(
	'用户'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
	//array('label'=>'用户列表','url'=>array('index')),
	array('label'=>'管理用户', 'icon'=>'user', 'url'=>array('admin')),
	array('label'=>'创建用户', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'查看用户', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
	array('label'=>'删除用户', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定要删除此项吗?')),
);
?>

	<h1>修改用户 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>