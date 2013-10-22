<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'数据库备份',
);
?>
<h1>数据库备份</h1>
<?php
$this->widget('bootstrap.widgets.TbExtendedGridView',
    array(
        'dataProvider' => $gridDataProvider,
        'template' => "{items}",
        'bulkActions' => array(
        	'align' => 'left',
			'actionButtons' => array(
				array(
					'id'=>'backup',
					'buttonType' => 'button',
					'type' => 'success',
					'size' => 'default',
					'label' => '备份数据表',
					'click' => 'js:function(checked){
						var values = [];
						checked.each(function(){values.push($(this).val());});
						console.log(values);
						location.href = "'.Yii::app()->createUrl("database/default/backup", array("table"=>"")).'"+values; 
					}'
				),
				array(
					'id'=>'optimze',
					'buttonType' => 'button',
					'type' => 'success',
					'size' => 'default',
					'label' => '优化数据表',
					'click' => 'js:function(checked){
						var values = [];
						checked.each(function(){values.push($(this).val());});
						console.log(values);
						location.href = "'.Yii::app()->createUrl("database/default/optimize", array("table"=>"")).'"+values; 
					}'
				),
				array(
					'id'=>'repair',
					'buttonType' => 'button',
					'type' => 'success',
					'size' => 'default',
					'label' => '修复数据表',
					'click' => 'js:function(checked){
						var values = [];
						checked.each(function(){values.push($(this).val());});
						console.log(values);
						location.href = "'.Yii::app()->createUrl("database/default/repair", array("table"=>"")).'"+values; 
					}'
				),
			),
			// if grid doesn't have a checkbox column type, it will attach
			// one and this configuration will be part of it
			'checkBoxColumnConfig' => array(
			    'name' => $gridDataProvider->keyField,
			),
		),
        'columns' =>$gridColumns
    )
);
?>

