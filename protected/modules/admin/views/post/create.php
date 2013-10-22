<?php
$this->breadcrumbs=array(
	'文章'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理文章', 'icon'=>'file-text', 'url'=>array('admin')),
	array('label'=>'创建文章', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>创建文章</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>