<?php
$this->breadcrumbs=array(
	'数据库恢复'=>array('restore'),
);?>
<h1> 管理数据库备份文件</h1>

<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));