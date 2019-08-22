<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// defined('YII_DEBUG') or define('YII_DEBUG',true); // remove the following lines when in production mode
// defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3); // specify how many levels of call stack should be shown in each log message

if (!file_exists($yii))        die("<strong>Framework</strong> missing!");
elseif (!file_exists($config)) die("<strong>Config</strong> missing!");

require_once($yii);
Yii::createWebApplication($config)->run();