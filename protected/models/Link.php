<?php

/**
 * This is the model class for table "{{link}}".
 *
 * The followings are the available columns in table '{{link}}':
 * @property string $name
 * @property string $url
 * @property string $img
 * @property integer $target
 * @property integer $type
 * @property integer $position
 * @property integer $visible
 */
class Link extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{link}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url', 'required'),
			array('target,visible', 'boolean'),
			array('type, position', 'numerical', 'integerOnly'=>true),
			array('url', 'url'),
			array('img', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'maxSize'=>2097152, 'tooLarge' => '{file}文件不能超过 2MB. 请上传小一点儿的文件.',),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, url, img, target, type, position, visible', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'url' => '网址',
			'img' => 'logo',
			'target' => '打开方式',
			'type' => '类型',
			'position' => '排序',
			'visible' => '是否显示',
		);
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

		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('target',$this->target);
		$criteria->compare('type',$this->type);
		$criteria->compare('position',$this->position);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Link the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
