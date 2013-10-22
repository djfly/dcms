<?php
$this->breadcrumbs=array(
	'用户'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理用户', 'icon'=>'user', 'url'=>array('admin')),
	array('label'=>'创建用户', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>创建用户</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>