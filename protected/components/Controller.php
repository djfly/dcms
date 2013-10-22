<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $ipFilters;

	protected function beforeAction($action) {
        if(parent::beforeAction($action))
		{
			$route=Yii::app()->controller->id.'/'.$action->id;
			if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='site/error'&& $route!=='site/login'){
				throw new CHttpException(403,"你未被允许访问.");
			}
			if(Yii::app()->params['closed'] && (Yii::app()->user->name!='admin') && $route!=='site/error'&& $route!=='site/login'){
				throw new CHttpException(403,"站点暂时关闭.");
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
		if (!empty(Yii::app()->params['ipAccess'])) {
			$this->ipFilters=explode("\r\n",Yii::app()->params['ipAccess']);
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