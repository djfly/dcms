<?php
$this->breadcrumbs=array(
	'用户'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'管理用户', 'icon'=>'user', 'url'=>array('admin')),
	array('label'=>'创建用户', 'icon'=>'plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('user-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>管理用户</h1>

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
'id'=>'user-grid',
'type'=>'hover',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'username',
		'password',
		'email',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
