<?php
$this->breadcrumbs=array(
	'分类'=>array('admin'),
	'创建',
);
?>

<h1>创建分类</h1>
<?php 
echo $this->renderPartial('_form', array('model'=>$model));
?>