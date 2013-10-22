<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property string $id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $name
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('level', 'numerical', 'integerOnly'=>true),
			array('root, lft, rgt', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, root, lft, rgt, level, name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'root' => 'Root',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
			'name' => '分类名称',
		);
	}


	public function behaviors() {
        return array(
            'NestedSetBehavior' => array(
                'class' => 'ext.nested-set-behavior.NestedSetBehavior',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'levelAttribute' => 'level',
                'hasManyRoots' => true,
        ));
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('root',$this->root,true);
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function treechild($id)
	{
		$curnode = self::model()->findByPk($id);
		if($curnode){
			$childrens = $curnode->children()->findAll();
			if(sizeOf($childrens)>0){
				$out = array();
				foreach($childrens as $children){
					$currow=array('id'=>$children->id,'text'=>"<div class=\"line\">ID:".$children->id."&nbsp;&nbsp;&nbsp;&nbsp;".$children->name."<span class=\"right15 pull-right\"><a class=\"update\" title=\"向上移动\" rel=\"tooltip\" href=\"".Yii::app()->getController()->createUrl('move', array('id'=>$children->id,'updown'=>'up'))."\"><i class=\"icon-arrow-up\"></i></a>&nbsp;&nbsp;<a class=\"update\" title=\"向下移动\" rel=\"tooltip\" href=\"".Yii::app()->getController()->createUrl('move', array('id'=>$children->id,'updown'=>'down'))."\"><i class=\"icon-arrow-down\"></i></a>&nbsp;&nbsp;<a class=\"update\" title=\"修改\" rel=\"tooltip\" href=\"".Yii::app()->getController()->createUrl('update', array('id'=>$children->id))."\"><i class=\"icon-pencil\"></i></a>&nbsp;&nbsp;".CHtml::link('<i class="icon-trash"></i>', '#',array('class'=>'delete','title'=>'删除','rel'=>'tooltip','submit' => array('delete', 'id'=>$children->id), 'confirm' => '确定要删除此项吗?'))."</span></div>",'children'=>self::treechild($children->id));
					$out[]=$currow;
				}
				return $out;
			}
			else{
				return null;
			}
		}
		return null;
	}

	public static function treedata()
	{
		$roots = self::model()->roots()->findAll();
		$out = array();
		foreach($roots as $root){
			$currow=array('id'=>$root->id,'text'=>"<div class=\"line\">ID:".$root->id."&nbsp;&nbsp;&nbsp;&nbsp;".$root->name."<span class=\"right15 pull-right\"><!--<a class=\"update\" title=\"向上移动\" rel=\"tooltip\" href=\"".Yii::app()->getController()->createUrl('move', array('id'=>$root->id,'updown'=>'up'))."\"><i class=\"icon-arrow-up\"></i></a>&nbsp;&nbsp;<a class=\"update\" title=\"向下移动\" rel=\"tooltip\" href=\"".Yii::app()->getController()->createUrl('move', array('id'=>$root->id,'updown'=>'down'))."\"><i class=\"icon-arrow-down\"></i></a>&nbsp;&nbsp;--><a class=\"update\" title=\"修改\" rel=\"tooltip\" href=\"".Yii::app()->getController()->createUrl('update', array('id'=>$root->id))."\"><i class=\"icon-pencil\"></i></a>&nbsp;&nbsp;".CHtml::link('<i class="icon-trash"></i>', '#',array('class'=>'delete','title'=>'删除','rel'=>'tooltip','submit' => array('delete', 'id'=>$root->id), 'confirm' => '确定要删除此项吗?'))."</span></div>",'children'=>self::treechild($root->id));
			$out[]=$currow;
		}
		return $out;
	}

}
