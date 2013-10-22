<?php
$this->breadcrumbs=array(
	'文件'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理文件', 'icon'=>'file', 'url'=>array('admin')),
	array('label'=>'创建文件', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>Create Upload</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>