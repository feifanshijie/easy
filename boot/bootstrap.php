<?php

namespace Boot;

header('Content-type: application/json');
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:content-type,authorization");
header("Access-Control-Request-Method:GET,POST,OPTIONS");
header('charset=utf-8');
header("X-Powered-By: FunnyPHP");

ini_set('date.timezone', 'Asia/Shanghai');

/**验证版本*/
version_compare(PHP_VERSION, '7.0') < 0 && die('PHP版本小于7.0,请升级PHP版本');

/**获取请求路由*/
$query_string = $_SERVER['QUERY_STRING'] ?? '';
$query_url = $_SERVER['REQUEST_URI'] ?? '';
$rout = str_replace('?'.$query_string,'',$query_url);

require '../boot/param.php';               //加载全局静态变量
require '../boot/func.php';                //加载全局帮助函数
require '../boot/service.php';             //加载全局服务
require '../boot/register.php';            //注册全局服务
require __DIR__.'/../vendor/autoload.php'; //composer自动载入

/**运行*/
if(!empty(ROUTE[$rout]))
{
    $app = new Application($rout);
    $response = $app->run();
    echo is_array($response) ? json_encode($response) : $response;
}
