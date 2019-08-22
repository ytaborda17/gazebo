<?php

$root = preg_replace('/\W\w+\s*(\W*)$/', '$1', dirname(__FILE__).DIRECTORY_SEPARATOR);

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'          =>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'              =>'Gazebo',
	'theme'             =>'gazebo',
	'language'          =>'es', 	// user language (for Locale)
	'charset'           =>'utf-8',	// charset to use
	'defaultController' =>'site',
	'preload'           =>array('log'), // preloading 'log' component
	'timeZone'          =>'America/Caracas',
	'behaviors'         =>array(
		'class'=>'application.behaviors.RegisterVisitor',
	),
	'aliases'=>array(
		'assets'=> str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/assets/"),
	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.YiiMailer.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'kami',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array( // uncomment the following to enable URLs in path-format
			'class'=>'ext.seoUrlManager.components.ExtSeoUrlManager',
			// 'wwwMode'=>'strip',
			'urlFormat'      =>'path',
			'showScriptName' =>false,
			'urlSuffix'      =>'',
			'rules'=>array(
				''=>'site/index',
				'mapa-del-sitio'=>'site/map',
				'<action:[\w\-]+>' => 'site/<action>',
				'mobile/'=>'site/index',
				'mobile/<action:[\w\-]+>' => 'site/<action>',
				'h/'=>'site/index',
				'h/<action:[\w\-]+>' => 'site/<action>',
				'm/'=>'site/index',
				'm/<action:[\w\-]+>' => 'site/<action>',
			),
		),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
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

	// application-level parameters that can be accessed using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'copyRights' => 'copyright &copy; 2015 - 2018 {empresa}. all rights reserved. <span class="hidden invisible fhidden">me@ytaborda.com, stiven.ferrer@gmail.com</span>',
		'adminEmail' => 'gazebo@gazebo.com.ve',
		'dominio' => $_SERVER['HTTP_HOST'],
		'sitio' => 'gazebo',
		'root' => preg_replace('/\W\w+\s*(\W*)$/', '$1', $root),
		'assets_url'=> dirname(dirname($_SERVER['SCRIPT_NAME']))."/assets/",
		'grecaptcha' => array(
			'secretkey' => '6LeiLg0TAAAAAMfX9VQ-q9U-k3qJYA-jjk5tHee4',
			'data-sitekey' => '6LeiLg0TAAAAAI2xKkMOjestBDaNxoDrxlubXEet',
		),
	),
);
