<?php
$this->breadcrumbs=array(
	'文本映射'=>array('admin'),
	'管理',
);

$this->menu=array(
array('label'=>'管理文本映射', 'icon'=>'list-ol', 'url'=>array('admin')),
array('label'=>'创建文本映射', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>管理文本映射</h1>

<p>
	您可以选择输入一个比较操作符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) 在你每次搜索的值前面，以便指定那种比较应该被执行.
</p>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'lookup-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			'id',
			'name',
			'code',
			'type',
			'position',
	array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'buttons'=>array
					(
						'view' => array
						(
							'icon'=>false,
						),
					),
	),
	),
)); ?>
