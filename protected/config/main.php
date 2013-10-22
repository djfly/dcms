<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'DCMS',
	'language' => 'zh_cn',
	'timeZone'=>'Asia/Chongqing',
	// preloading 'log' component
	'preload'=>array('log','bootstrap',),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.YiiMailer.YiiMailer',
	),
	'modules'=>array(
		'install',
		'admin',
		'database',
		'auth'=>array(
			'userClass' => 'User', // the name of the user model class.
			'userIdColumn' => 'id', // the name of the user id column.
			'userNameColumn' => 'username', // the name of the user name column.
			'defaultLayout' => 'application.modules.admin.views.layouts.column2', 
			),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'enter',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
                'bootstrap.gii'
            ),
		),
		
	),

	// application components
	'components'=>array(
		// csrf防御
		// 'request'=>array(
		// 	'enableCsrfValidation'=>true,
		// ),
		'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'itemTable' => '{{authitem}}',
            'itemChildTable' => '{{authitemchild}}',
            'assignmentTable' => '{{authassignment}}',
            'behaviors' => array(
                'auth' => array(
                    'class' => 'auth.components.AuthBehavior',
                ),
            ),
        ),
		'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'auth.components.AuthWebUser',
            // users with full access
            'admins' => array('admin'), 
        ),
		'config' => array(
			'class' => 'application.extensions.EConfig',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=dcms',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'pre_',
			// 'enableProfiling'=>true,
        	// 'enableParamLogging'=>true,
		),
		'cache'=>array(
            'class'=>'CFileCache',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
            'fontAwesomeCss' => true,
            'enableNotifierJS' => false,
            'enableBootboxJS' => false
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					//'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);