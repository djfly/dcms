<?php
$this->breadcrumbs=array(
	'文章',
);

$this->menu=array(
	array('label'=>'管理文章', 'icon'=>'file-text', 'url'=>array('admin')),
	array('label'=>'创建文章', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>Posts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
