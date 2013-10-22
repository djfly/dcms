<?php
$this->breadcrumbs=array(
	'文章'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
array('label'=>'管理文章', 'icon'=>'file-text', 'url'=>array('admin')),
array('label'=>'创建文章', 'icon'=>'plus', 'url'=>array('create')),
array('label'=>'查看文章', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
array('label'=>'删除文章', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定要删除此项吗?')),
);
?>

	<h1>修改文章 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>