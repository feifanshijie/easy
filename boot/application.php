<?php

namespace Boot;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

/**
 * 应用启动
 */

class Application
{
    private $_app     = null;
    private $_action   = null;
    private $_function = null;
    private $_capsule  = null;

    /**
     * 初始化参数
     */
    public function __construct()
    {
        $rout = str_replace('?'.($_SERVER['QUERY_STRING'] ?? ''),'',$_SERVER['REQUEST_URI'] ?? '');

        if(empty(ROUTE[$rout]))
        {
            exit('there is nothing');
        }
        else
        {
            self::header();
            $info = explode('@', ROUTE[$rout]);
            $this->_action = '\\App\\'.CONFIG['app']['action'].'\\'.$info[1];
            $this->_function = $info[2];
        }
    }

    public function header()
    {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Headers:content-type,authorization");
        header("Access-Control-Request-Method:GET,POST,OPTIONS");
        header('charset=utf-8');
        header("X-Powered-By: FunnyPHP");
        ini_set('date.timezone', 'Asia/Shanghai');
    }

    /**
     * 运行验证请求方法
     */
    public function run($callpack)
    {
        if($this->_capsule === null)
        {
            $capsule = new Capsule;
            $capsule->addConnection(CONFIG['db']);
            $capsule->setEventDispatcher(new Dispatcher(new Container));
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
        }

        $function = $this->_function;
        $response = (new $this->_action(new Service()))->$function();
        echo is_array($response) ? json_encode($response) : $response;
    }

    /**
     * 记录日志等等
     */
    public function __destruct()
    {

    }
}
