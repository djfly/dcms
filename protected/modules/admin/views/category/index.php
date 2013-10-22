<?php
$this->breadcrumbs=array(
	'分类',
    );
?>

<h1>分类管理</h1>
<style type="text/css">
#treelink div.line{line-height: 24px;}
.right15{margin-right: 15px;}
</style>
<?php
$this->widget('system.web.widgets.CTreeView',
    array(
        'id'=>'treelink',
        'data'=>$data,
    )
);
Yii::app()->clientScript->registerScript('clickscript',"
$('#treelink div.line:even').css('backgroundColor','#FAFAFA');
",CClientScript::POS_READY);
?>

