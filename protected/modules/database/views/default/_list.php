<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'install-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		array('name'=>'name', 'header'=>'名字'),
		array('name'=>'size', 'header'=>'大小'),
		array('name'=>'create_time', 'header'=>'创建时间'),
		array(
			'htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'buttons'=>array
			(
				'view' => array
				(
					'icon'=>'download-alt',
					'options'=>array('title'=>'下载'),
				),
				'update' => array
				(
					'icon'=>'repeat',
					'options'=>array('title'=>'恢复'),
				),
			),
			'viewButtonUrl'=>'Yii::app()->createUrl("database/default/download", array("file"=>$data["name"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("database/default/restore", array("file"=>$data["name"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("database/default/delete", array("file"=>$data["name"]))',
		),
	),
)); ?>