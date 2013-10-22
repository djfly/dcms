<?php
$this->breadcrumbs=array(
	'分类'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'修改',
);
?>

	<h1>修改分类 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>