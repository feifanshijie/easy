<?php

namespace Boot;

//$_ENV['ENV'] = '../config/'.ENV;
//$_ENV['CONFIG_PATH'] = '../config/'.ENV;

/**获取请求路由*/
define('ENV', 'localhost');
define('CONFIG_PATH', '../config/'.ENV);
define('BASE_PATH', '../'.dirname(__FILE__));                              //根目录
define('CONFIG', parse_ini_file(CONFIG_PATH.'/app.ini',true)); //加载配置文件
define('ROUTE', require '../config/router.php');                                //加载路由

require '../boot/func.php';                //加载全局帮助函数
require '../boot/service.php';             //加载全局服务
require '../boot/runtime.php';             //注册运行时服务
require __DIR__.'/../vendor/autoload.php'; //composer自动载入

/**运行*/
(new Application())->run(function(){
    return 213123;
});
