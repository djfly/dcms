<?php
$this->breadcrumbs=array(
	'用户',
);

$this->menu=array(
array('label'=>'管理用户','url'=>array('admin')),
array('label'=>'创建用户','url'=>array('create')),
);
?>

<h1>用户</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
