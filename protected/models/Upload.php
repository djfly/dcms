<?php

/**
 * This is the model class for table "{{upload}}".
 *
 * The followings are the available columns in table '{{upload}}':
 * @property integer $id
 * @property integer $post_id
 * @property integer $author_id
 * @property string $name
 * @property integer $size
 * @property string $description
 * @property string $path
 * @property integer $type
 * @property integer $create_time
 */
class Upload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{upload}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id, author_id, size, type, create_time', 'numerical', 'integerOnly'=>true),
			array('name, description, path', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, post_id, author_id, name, size, description, path, type, create_time', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
            'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'post_id' => '文章id',
			'author_id' => '作者id',
			'name' => '文件名',
			'size' => '文件尺寸',
			'description' => '说明',
			'path' => '地址',
			'type' => '类型',
			'create_time' => '创建时间',
		);
	}

	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=time();
				$this->author_id=Yii::app()->user->id;
			}
			return true;
		}
		else
			return false;
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

		$criteria->compare('id',$this->id);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Upload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
