<?php
echo CHtml::tag('h4',array(),$id.' 表的结构');
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'type' => 'bordered condensed',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'columns' => $gridColumns,
));