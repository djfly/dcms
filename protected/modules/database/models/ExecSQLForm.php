<?php

class ExecSQLForm extends CFormModel
{
	public $sql;
	public function rules()
	{
		return array(
			array('sql','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'sql'=>'SQL语句',
		);
	}
}
