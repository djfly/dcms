<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'category-form',
	'type'=>'horizontal',
	'enableClientValidation'=>true,
)); ?>
<?php echo $form->errorSummary($model); ?>

<?php

if (!$model->isNewRecord) {
    $category_check = Category::model()->findByPk($model->id);
    $parent = $category_check->parent()->find();
}
echo '<div class="control-group "><label class="control-label" for="Category_node">请选择分类</label><div class="controls"><select id="Category_node" name="Category[node]">';
$categories = Category::model()->roots()->findAll();
$level = 1;
echo '<option value="0">选择所属分类</option>';
foreach ($categories as $n => $category) {
    if (!$model->isNewRecord) {
        if (isset($parent->id)&&($parent->id== $category->id)) {
            $selected = 'selected';
            echo '<option value="' . $category->id . '" selected="' . $selected . '">' . $category->name . '</option>';
        } else {
            echo '<option value="' . $category->id . '">' . $category->name . '</option>';
        }
    } else {
        echo '<option value="' . $category->id . '">' . $category->name . '</option>';
    }

    $children = $category->descendants()->findAll();
    foreach ($children as $child) {
        $string = '&nbsp;&nbsp;';
        $string .= str_repeat('│&nbsp;&nbsp;', $child->level - $level - 1);
        if ($child->isLeaf() && !$child->next()->find()) {
            $string .= '└';
        } else {

            $string .= '├';
        }
        $string .= '─' . $child->name;
		// echo $string;
        if (!$model->isNewRecord) {
            if (isset($parent->id)&&($parent->id == $child->id)) {
                $selected = 'selected';

                echo '<option value="' . $child->id . '" selected="' . $selected . '">' . $string . '</option>';
            } else {
                echo '<option value="' . $child->id . '" >' . $string . '</option>';
            }
        } else {
            echo '<option value="' . $child->id . '" >' . $string . '</option>';
        }
    }
}
echo '</select></div></div>';
?>

<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
</div>

<?php $this->endWidget(); ?>
