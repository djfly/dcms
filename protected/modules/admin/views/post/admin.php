<?php
$this->breadcrumbs=array(
	'文章'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'管理文章', 'icon'=>'file-text', 'url'=>array('admin')),
	array('label'=>'创建文章', 'icon'=>'plus', 'url'=>array('create')),
);


?>

<h1>管理文章</h1>

<p>
	您可以选择输入一个比较操作符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) 在你每次搜索的值前面，以便指定那种比较应该被执行.
</p>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'post-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width: 50px;'),
		),
		array(
			'header'=>'分类',
			'name'=>'category.name',
			'htmlOptions'=>array('style'=>'width: 100px;'),
		),
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
		),
		array(
			'name'=>'status',
			'filter'=>Lookup::items('PostStatus'),
            'value'=>'Lookup::item("PostStatus",$data->status)',
			'htmlOptions'=>array('style'=>'width: 100px;text-align: center;'),
		),
		array(
			'name'=>'create_time',
			'filter'=>false,
			'value'=>'date("Y-m-d",$data->create_time)',
			'htmlOptions'=>array('style'=>'width: 100px;text-align: center;')
		),
		array(
			'name'=>'update_time',
			'filter'=>false,
			'value'=>'date("Y-m-d",$data->update_time)',
			'htmlOptions'=>array('style'=>'width: 100px;text-align: center;')
		),
		array(
			'header'=>'作者',
			'name'=>'author.username',
			'htmlOptions'=>array('style'=>'width: 100px;'),
		),
		array('class'=>'bootstrap.widgets.TbButtonColumn'),
),
)); ?>
