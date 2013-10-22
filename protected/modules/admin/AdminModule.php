<?php

class AdminModule extends CWebModule
{
	public $ipFilters;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$route=$controller->id.'/'.$action->id;
			if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='default/error'&& $route!=='default/login'){
				throw new CHttpException(403,"你未被允许访问后台.");
			}

			return true;
		}
		else
			return false;
	}

	/**
	 * Checks to see if the user IP is allowed by {@link ipFilters}.
	 * @param string $ip the user IP
	 * @return boolean whether the user IP is allowed by {@link ipFilters}.
	 */
	protected function allowIp($ip)
	{
		if (!empty(Yii::app()->params['ipAdminAccess'])) {
			$this->ipFilters=explode("\r\n",Yii::app()->params['ipAdminAccess']);
		}
		if(empty($this->ipFilters))
			return true;
		foreach($this->ipFilters as $filter)
		{
			if($filter==='*' || $filter===$ip || (($pos=strpos($filter,'*'))!==false && !strncmp($ip,$filter,$pos)))
				return true;
		}
		return false;
	}
}
