<?php

class AccessForm extends CFormModel
{
	public $ipAccess;
	public $ipAdminAccess;
	public function rules()
	{
		return array(
			array('ipAccess,ipAdminAccess','default','value'=>'')
		);
	}

	public function attributeLabels()
	{
		return array(
			'ipAccess'=>'允许访问站点的 IP 列表',
			'ipAdminAccess'=>'允许访问后台的 IP 列表',
			
		);
	}

	/**
	 * Checks to see if the user IP is allowed by {@link ipFilters}.
	 * @param string $ip the user IP
	 * @param array $ipFilters IP List
	 * @return boolean whether the user IP is allowed by {@link ipFilters}.
	 */
	public static function allowIp($ip,$ipFilters)
	{
		if(empty($ipFilters))
			return true;
		foreach($ipFilters as $filter)
		{
			if($filter==='*' || $filter===$ip || (($pos=strpos($filter,'*'))!==false && !strncmp($ip,$filter,$pos)))
				return true;
		}
		return false;
	}

	/**
	 * Checks to see if the user IP is allowed by {@link $accesslist}.
	 * @param string $ip the user IP
	 * @param string $accesslist IP List
	 * @return boolean whether the user IP is allowed by {@link $accesslist}.
	 */
	public static function ipAccessSelf($ip, $accesslist)
	{
		return preg_match("/^(".str_replace(array("\r\n", ' '), array('|', ''), preg_quote($accesslist, '/')).")/", $ip);
	}
}
