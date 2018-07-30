<?php
/**
 * 是否开启DEBUG
 */
//if(CONFIG['app']['debug'] == true)
//{
//    error_reporting(E_ALL);
//    $e2 = 'On';
//}
//else
//{
//    error_reporting(0);
//    $e2 = 'Off';
//}
//
//ini_set('display_errors',$e2);

error_reporting(E_ALL);
ini_set('display_errors','On');

/**
 * 自动加载
 */
spl_autoload_register(function ($class) {
    $file_path = str_replace("\\",'/', '../'.$class . '.php');
    include_once "{$file_path}";
});

$day = date('Y-m-d');

/**
 * 异常错误捕获
 */
//set_error_handler(function ($error_no, $error_info, $error_file, $error_line) use ($day){
//    switch ($error_no) {
//        case E_USER_ERROR:
//            $error_name = "ERROR:";
//            break;
//        case E_USER_WARNING:
//            $error_name = "WARNING:";
//            break;
//        case E_USER_NOTICE:
//            $error_name = "NOTICE:";
//            break;
//        default:
//            $error_name = "未知错误类型:";
//            break;
//    }
//
//    file_put_contents("../Storage/log/error/{$day}.log",
//        "{$error_name}编号[{$error_no}]{$error_info}位置文件{$error_file},第{$error_line}行\n",
//        FILE_APPEND);
//});
//
///**
// * 是否记录请求路由日志
// */
//if(true == CONFIG['app']['access_log'])
//{
//    $file_name = "../Storage/log/access/{$day}.log";
//    $text = 'Time:'. date('Y-m-d H:i:s', time())." IP:{$_SERVER['REMOTE_ADDR']} Route:{1}\n";
//    file_put_contents($file_name, $text, FILE_APPEND);
//}
