<?php
$this->breadcrumbs=array(
	'文本映射'=>array('admin'),
	'创建',
);

$this->menu=array(
array('label'=>'管理文本映射', 'icon'=>'list-ol', 'url'=>array('admin')),
array('label'=>'创建文本映射', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>创建文本映射</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>