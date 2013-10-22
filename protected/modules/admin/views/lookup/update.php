<?php
$this->breadcrumbs=array(
	'文本映射'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
array('label'=>'管理文本映射', 'icon'=>'list-ol', 'url'=>array('admin')),
array('label'=>'创建文本映射', 'icon'=>'plus', 'url'=>array('create')),
array('label'=>'查看文本映射', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

	<h1>修改文本映射 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>