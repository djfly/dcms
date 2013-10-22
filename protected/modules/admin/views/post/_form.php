<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'post-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php
echo '<div class="control-group "><label class="control-label" for="Post_category_id">请选择分类</label><div class="controls"><select id="Post_category_id" name="Post[category_id]">';

$category = Category::model()->findByPk(1);
$descendants = $category->descendants()->findAll();
$level = 1;
echo '<option value="">请选择分类</option>';
foreach ($descendants as $child) {
    $string = '&nbsp;&nbsp;';
    $string .= str_repeat('&nbsp;&nbsp;', $child->level - $level);
    if ($child->isLeaf() && !$child->next()->find()) {
        $string .= '';
    } else {

        $string .= '';
    }
    $string .= '' . $child->name;
//		echo $string;
    if (!$model->isNewRecord) {
        if ($model->category_id == $child->id) {
            $selected = 'selected';

            echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
        } else {
            echo '<option value="' . $child->id . '" >' . $string . '</option>';
        }
    } else {
        echo '<option value="' . $child->id . '" >' . $string . '</option>';
    }
}
echo '</select></div></div>';
?>
<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>128)); ?>
<?php echo $form->textAreaRow($model, 'content', array('visibility' => 'hidden')); ?>
<?php $this->widget('ext.kindeditor.KindEditorWidget',array(
    'id'=>'Post_content',   //Textarea id
    'language'=>'zh_CN',
    // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
    'items' => array(
        'width'=>'700px',
        'height'=>'300px',
        'urlType'=>'relative',
        'themeType'=>'simple',
        //'cssPath'=> '/plugins/code/prettify.css',
        'uploadJson'=>$this->createUrl('upload/createimg'),
        'allowImageUpload'=>true,
        // 'fileManagerJson'=>'../php/file_manager_json.php',
        // 'allowFileManager'=>true,
        'items'=>array(
            'source','preview','|','fontname', 'fontsize', 'forecolor', 'hilitecolor', '|', 'bold', 'italic',
            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
            'justifyright', 'insertorderedlist','insertunorderedlist', '|',
            'link', 'unlink','image','multiimage','table', 'emoticons','baidumap','code','pagebreak','quickformat','fullscreen'),
    ),
)); ?>
 
<?php echo $form->dropDownListRow($model,'status',Lookup::items('PostStatus')); ?>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
</div>

<?php $this->endWidget(); ?>
