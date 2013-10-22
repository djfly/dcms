<?php
$this->breadcrumbs=array(
	'文件'=>array('admin'),
	$model->id,
);

$this->menu=array(
array('label'=>'管理文件', 'icon'=>'file-text', 'url'=>array('admin')),
array('label'=>'创建文件', 'icon'=>'plus', 'url'=>array('create')),
array('label'=>'修改文件', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
array('label'=>'删除文件', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定要删除此项吗?')),
);
?>

<h1>View Upload #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'post_id',
		'author_id',
		'name',
		'size',
		'description',
		'path',
		'type',
		array(
			'name'=>'create_time',
			'value'=>date("Y-m-d H:i:s",$model->create_time),
		),
),
)); ?>
