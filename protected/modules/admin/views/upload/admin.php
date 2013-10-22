<?php
$this->breadcrumbs=array(
	'文件'=>array('admin'),
	'管理',
);
$this->menu=array(
	array('label'=>'管理文件', 'icon'=>'file', 'url'=>array('admin')),
	array('label'=>'创建文件', 'icon'=>'plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('upload-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>管理文件</h1>

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
'id'=>'upload-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width: 50px;'),
		),
		array(
			'name'=>'post_id',
			'htmlOptions'=>array('style'=>'width: 50px;'),
		),
		array(
			'name'=>'author_id',
			'htmlOptions'=>array('style'=>'width: 50px;'),
		),
		'name',
		'size',
		'description',
		array(
			'name' => 'path',
			'type'=>'image',
		),
		'type',
		array(
			'name'=>'create_time',
			'filter'=>false,
			'value'=>'date("Y-m-d",$data->create_time)',
			'htmlOptions'=>array('style'=>'width: 100px;text-align: center;')
		),
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
