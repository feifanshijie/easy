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
    private $_app = null;
    private $_action = null;
    private $_function = null;
    private $_capsule = null;

    /**
     * 初始化参数
     */
    public function __construct(string $path = '/')
    {
        self::header();
        $info = explode('@', ROUTE[$path]);
        $this->_action = '\\App\\'.CONFIG['app']['action'].'\\'.$info[1];
        $this->_function = $info[2];
        $this->_app = explode(':', ROUTE[$path]);
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
    public function run()
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

        $register = new Service();
        return (new $this->_action($register))->$function();
    }

    /**
     * 记录日志等等
     */
    public function __destruct()
    {

    }
}