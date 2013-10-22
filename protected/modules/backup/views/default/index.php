<?php
$this->breadcrumbs=array(
	'Manage'=>array('index'),
);?>
<h1> Manage database backup files</h1>

<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));
?>
