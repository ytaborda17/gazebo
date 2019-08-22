<?php

// This is the main Web application configuration. Any writable CWebApplication properties can be configured here.
return array(
	'basePath'          =>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'              =>'Gazebo [GESTOR]',
	'theme'             =>'booster',
	'language'          =>'es', 	// user language (for Locale)
	'charset'           =>'utf-8',	// charset to use
	'preload'           =>array('log'), // preloading 'log' component
	'defaultController' =>'app',
	'timeZone'          =>"America/Caracas",
	'aliases'=>array(
		'booster'=>(dirname(__FILE__) . DIRECTORY_SEPARATOR) . '/../extensions/yiibooster',
		'assets'=> str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].dirname(dirname($_SERVER['SCRIPT_NAME']))."/assets/"),
		'assetsGestor'=> str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].dirname(dirname($_SERVER['SCRIPT_NAME']))."/gestor/"),
	),
	'preload'=>array('log','booster'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.YiiMailer.*',
		'application.modules.cruge.components.*',
		'application.modules.cruge.extensions.crugemailer.*',
	),
	'modules'=>array(
		'gii'=>array(
			'class'     =>'system.gii.GiiModule',
			'password'  =>'kami',
			'ipFilters' =>array('127.0.0.1','::1'), // If removed, Gii defaults to localhost only. Edit carefully to taste.
			'generatorPaths' => array(
         	'bootstrap.gii',
      	),
		),
		'cruge'=>array(
			'tableprefix'=>'cruge_',
			// para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
			// en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
			// para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
			'availableAuthMethods' => array('default'),
			'availableAuthModes'   => array('username','email'),
			'baseUrl'              => 'http://www.gazebo.com.ve/gestor/activar-cuenta', // url base para los links de activacion de cuenta de usuario
			'debug'                => FALSE, // Despues de instalar cambiar a FALSE
			'rbacSetupEnabled'     => FALSE, // Despues de instalar cambiar a FALSE
			'allowUserAlways'      => FALSE, // Despues de instalar cambiar a FALSE
			'superuserName'        => "ytaborda",
			'guestUserId'          => 2,
			'useEncryptedPassword' => TRUE, // Despues de instalar cambiar a TRUE 
			'hash'                 => 'md5', // Algoritmo de la función hash que deseas usar.

			// Estos tres atributos controlan la redirección del usuario. Solo serán usados si no
			// hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
			// lee en la wiki acerca de: "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
			// ejemplo: 'afterLoginUrl'=>array('/app/welcome'),  ( !!! no olvidar el slash inicial / )
			'afterLoginUrl'          => array('/app/index'),
			'afterLogoutUrl'         => array('/cruge/ui/login'), 
			'afterSessionExpiredUrl' => array('/cruge/ui/login'), // null,

			// manejo del layout con cruge.
			'loginLayout'           =>'//layouts/login',
			'registrationLayout'    =>'//layouts/login',
			'resetPasswordLayout'   =>'//layouts/login',
			'activateAccountLayout' =>'//layouts/column2',
			'editProfileLayout'     =>'//layouts/column2',

			// en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
			// de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
			// requerirá de un portlet para desplegar un menu con las opciones de administrador.
			'generalUserManagementLayout' =>'ui',

			// permite indicar un array con los nombres de campos personalizados, 
			// incluyendo username y/o email para personalizar la respuesta de una consulta a: 
			// $usuario->getUserDescription(); 
			'userDescriptionFieldsArray' =>array('name','nombre','username','email'), 
		),
	),
	'components'=>array(
		/*'assetManager' => array(
			'linkAssets' => true,
		),*/
		/*'widgetFactory'=>array(
			'widgets'=>array(
				'CLinkPager'=>array(
					'cssFile'=>(strlen(dirname($_SERVER['SCRIPT_NAME']))>1 ? dirname($_SERVER['SCRIPT_NAME']) : '' ) . '/css/pager.css',
				),
			),
		),*/
		'booster' => array(
			'class' => 'booster.components.Booster',
        	'responsiveCss' => true,
        	'minify' => true,
        	// 'yiiCss' => true,
		),
		'user'=>array(
			'allowAutoLogin'=>true,
			'class'    => 'application.modules.cruge.components.CrugeWebUser',
			'loginUrl' => array('/cruge/ui/login'),
			'autoRenewCookie' => true,
		),
		'authManager' => array(
			'class' => 'application.modules.cruge.components.CrugeAuthManager',
		),
		'crugemailer'=>array(
			'class'         => 'application.modules.cruge.components.CrugeMailer',
			'mailfrom'      => 'noresponder@gazebo.com.ve',
			'subjectprefix' => 'GESTOR - ',
			'debug'         => true,
		),
		'format' => array(
			'datetimeFormat'=>"d/m/Y h:m a",
		),
		'urlManager'=>array(
			// 'class'=>'ext.seoUrlManager.components.ExtSeoUrlManager',
			// 'wwwMode'=>'strip',
			'cacheID'=>'cache',
			'urlFormat'      =>'path',
			'showScriptName' =>false,
			'urlSuffix'      =>'',
			'caseSensitive'  =>true,
			'rules'          =>array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				
				'soporte' => 'app/soporte',
				// 'index' => 'app/index',
				// '' => 'app/index',
				// 'productos/<title:[\w\-]+>' => 'site/productosDetalle',

				'activar-cuenta' => 'cruge/ui/activationurl',
				'bienvenido' => 'cruge/ui/welcome',
				'borrar-campo-perfil/<id:\w+>' => 'cruge/ui/fieldsadmindelete', 
				'borrar-usuario/<id:\d+>' => 'cruge/ui/usermanagementdelete', 'borrar-usuario' => 'cruge/ui/usermanagementdelete',
				'campos-perfil' => 'cruge/ui/fieldsadminlist',
				'editar-campo-perfil/<id:\w+>' => 'cruge/ui/fieldsadminupdate', 'editar-campo-perfil/' => 'cruge/ui/fieldsadminupdate', 
				'editar-permisos-rol/<id:\w+>' => 'cruge/ui/rbacauthitemchilditems', 'editar-permisos-rol' => 'cruge/ui/rbacauthitemchilditems', 
				'editar-rol/<id:\w+>' => 'cruge/ui/rbacauthitemupdate', 'editar-rol' => 'cruge/ui/rbacauthitemupdate', 
				'editar-usuario/<id:\d+>' => 'cruge/ui/usermanagementupdate', 'editar-usuario' => 'cruge/ui/usermanagementupdate', 
				'eliminar-rol/<id:\w+>' => 'cruge/ui/rbacauthitemdelete', 'eliminar-rol' => 'cruge/ui/rbacauthitemdelete', 
				'entrar' => 'cruge/ui/login',
				'nuevo-campo_perfil' => 'cruge/ui/fieldsadmincreate',
				'nuevo-rbac/<type:\d+>' => 'cruge/ui/rbacauthitemcreate','nuevo-rbac' => 'cruge/ui/rbacauthitemcreate',
				'nuevo-usuario' => 'cruge/ui/usermanagementcreate',
				
				// 'operaciones/<filter:\w+>' => 'cruge/ui/rbaclistops',
				'operaciones' => 'cruge/ui/rbaclistops',
				'perfil' => 'cruge/ui/editprofile', //usermanagementadmin
				'recuperar-clave' => 'cruge/ui/pwdrec',
				'registro' => 'cruge/ui/registration',
				'roles' => 'cruge/ui/rbaclistroles',
				'roles-masivos' => 'cruge/ui/rbacusersassignments',
				'salir' => 'cruge/ui/logout',
				'sesiones' => 'cruge/ui/sessionadmin',
				'sistema' => 'cruge/ui/systemupdate',
				'terminos' => 'cruge/ui/terms',
				'usuario-guardado' => 'cruge/ui/usersaved',
				'usuarios' => 'cruge/ui/usermanagementadmin',
			),
		),
		
		'db'=>require(dirname(__FILE__).'/db.php'), // database settings are configured in db.php
		'site_db'=>require(dirname(__FILE__).'/site_db.php'), // database settings are configured in site_db.php
		
		'errorHandler'=>array(
			'errorAction'=>'app/error', // use 'app/error' action to display errors
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'  =>'CFileLogRoute',
					'levels' =>'error, warning',
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
	'params'=>array( // application-level parameters that can be accessed using Yii::app()->params['paramName']
		'showInvitado' => false, // Si es true y se loguea como super administrador podra ver los detalles de roles y usuario INVITADO
		'copyRights' => 'Copyright &copy; 2015 - 2018 YTaborda. all rights reserved. <span class="hidden invisible fhidden">me@ytaborda.com</span>',
		'adminEmail' => 'web@ytaborda.com', // this is used in contact page
		'dominio' => 'http://www.gazebo.com.ve/',
		'moneda' => 'Bs.',
		'assets_url'=> str_replace("//", "/", dirname(dirname($_SERVER['SCRIPT_NAME']))."/assets/"),
		'root' => preg_replace('/\W\w+\s*(\W*)$/', '$1', preg_replace('/\W\w+\s*(\W*)$/', '$1', dirname(__FILE__).DIRECTORY_SEPARATOR)),
		'controllerNotAllowed'=>array('Auditoria'),
		'grecaptcha' => array(
			'secretkey' => '6LeiLg0TAAAAAMfX9VQ-q9U-k3qJYA-jjk5tHee4',
			'data-sitekey' => '6LeiLg0TAAAAAI2xKkMOjestBDaNxoDrxlubXEet',
		),
		'twitter'    => array(
			'oauth_access_token' => "110167391-wyIeynv0aUG4qc5prIDnPPTrKu7xOHXll5NAFS6S",
			'oauth_access_token_secret' => "ZlFilWo9BVcQD0jS6iEL5FcuAglXbAwszCb9S66rIg3wr",
			'consumer_key' => "PnfBWZB1CzCAvGzx7HT7lCMpr",
			'consumer_secret' => "crdg7wiAnTQytOeuL68DlRUrR5wRdPznSnb1TCLle5SVSSMkPm",
		),
	),
);