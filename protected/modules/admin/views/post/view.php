<?php
$this->breadcrumbs=array(
	'文章'=>array('admin'),
	$model->title,
);

$this->menu=array(
array('label'=>'管理文章', 'icon'=>'file-text', 'url'=>array('admin')),
array('label'=>'创建文章', 'icon'=>'plus', 'url'=>array('create')),
array('label'=>'修改文章', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
array('label'=>'删除文章', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定要删除此项吗?')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'category.name',
		'title',
		array(
			'name'=>'status',
			'value'=>Lookup::item("PostStatus",$model->status),
		),
		array(
			'name'=>'create_time',
			'value'=>date("Y-m-d H:i:s",$model->create_time),
		),
		array(
			'name'=>'update_time',
			'value'=>date("Y-m-d H:i:s",$model->update_time),
		),
		array(
			'label'=>'用户',
			'name'=>'author.username',
		),
		array(
			'name'=>'content',
			'type'=>'raw',
		),
),
)); ?>
<div class="pagination">
<?php  $this->widget('bootstrap.widgets.TbPager',array(  
'header'=>'',
'alignment'=>'centered',
'firstPageLabel' => '首页',  
'lastPageLabel' => '末页',  
'prevPageLabel' => '上一页',  
'nextPageLabel' => '下一页',  
'pages' => $pages,  
'maxButtonCount'=>13,
)
);  
?>
</div>
