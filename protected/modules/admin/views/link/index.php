<?php
$this->breadcrumbs=array(
	'菜单管理',
);
?>

<h1>菜单管理</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
