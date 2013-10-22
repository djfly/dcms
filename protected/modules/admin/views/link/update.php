<?php
$this->breadcrumbs=array(
	'菜单管理'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);
?>

<h1>修改菜单 <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>