<?php
$this->breadcrumbs=array(
	'链接'=>array('admin'),
	'创建',
);
?>

<h1>创建链接</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>