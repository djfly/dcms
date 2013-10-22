<?php
$this->breadcrumbs=array(
	'分类'=>array('admin'),
	'管理分类',
);

$this->menu=array(
array('label'=>'分类管理', 'icon'=>'align-justify', 'url'=>array('index')),
array('label'=>'创建分类', 'icon'=>'plus', 'url'=>array('create')),
array('label'=>'管理分类', 'icon'=>'sitemap', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('category-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>管理分类</h1>

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
'id'=>'category-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'root',
		'lft',
		'rgt',
		'level',
		'name',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
