<?php
/**
 * Explain 全局静态变量
 */

define('ENVIRONMENT', gethostbyaddr($_SERVER['REMOTE_ADDR']));                       //获取当前环境
define('BASE_PATH', '../'.dirname(__FILE__));                                   //根目录
define('F', 'FactoryLib/');
define('CONFIG_PATH', '../Config/'.ENVIRONMENT);                                     //配置文件目录
define('CONFIG', parse_ini_file(CONFIG_PATH.'/app.ini',true)); //加载配置文件
define('ROUTE', require '../Config/router.php');                                     //加载路由
