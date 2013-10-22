<?php
$this->breadcrumbs=array(
	'链接管理'=>array('admin'),
);
?>

<h1>链接管理</h1>
<p>
	您可以选择输入一个比较操作符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) 在你每次搜索的值前面，以便指定那种比较应该被执行.
</p>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'user-grid',
'type'=>'hover',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'name',
		array(
			'name' => 'url',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->url), $data->url,array("target"=>"_blank"))'
		),
		array(
			'name' => 'img',
			'type'=>'image',
		),
		array(
			'name' => 'type',
			'value'=>'Lookup::item("LinkType",$data->type)',
			'filter'=>Lookup::items('LinkType'),
		),
		array(
			'name'=>'position',
			'htmlOptions'=>array('style'=>'width: 40px;text-align: center;'),
		),
		array(
            'class' => 'bootstrap.widgets.TbToggleColumn',
            'toggleAction' => 'link/toggle',
            'name' => 'target',
            'checkedIcon'=>'icon-external-link',
            'uncheckedIcon'=>'icon-check-empty',
            'checkedButtonLabel'=>'在新窗口中打开',
            'uncheckedButtonLabel'=>'在当前窗口中打开',
            'filter'=>Lookup::items('LinkTarget'),
            'htmlOptions'=>array('style'=>'width: 100px;text-align: center;'),
        ),
		array(
            'class' => 'bootstrap.widgets.TbToggleColumn',
            'toggleAction' => 'link/toggle',
            'name' => 'visible',
            'checkedIcon'=>'icon-ok',
            'uncheckedIcon'=>'icon-remove',
            'checkedButtonLabel'=>'显示',
            'uncheckedButtonLabel'=>'不显示',
			'filter'=>Lookup::items('LinkVisible'),
            'htmlOptions'=>array('style'=>'width: 100px;text-align: center;'),
        ),
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
