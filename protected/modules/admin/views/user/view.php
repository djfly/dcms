<?php
$this->breadcrumbs=array(
	'用户'=>array('admin'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'用户列表','url'=>array('index')),
	array('label'=>'管理用户', 'icon'=>'user', 'url'=>array('admin')),
	array('label'=>'创建用户', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'修改用户', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'删除用户', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定要删除此项吗?')),
);
?>

<h1>查看用户 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
),
)); ?>
