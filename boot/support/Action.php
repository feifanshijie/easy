<?php

namespace Boot\Support;

use Boot\Service;
use duncan3dc\Laravel\BladeInstance;

abstract class Action extends Base
{
    public $service = null;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    public function model(string $model, string $method)
    {
        return $model::$method();
    }

    protected function render($view, $data) : string
    {
        $path = '../App/Front/view';
        $cache = '../storage/views/view';
    }

    /**
     * TODO:跳转地址
     * @param string $url  跳转地址
     * @param int    $time 秒
     */
    public function redirect(string $url, integer $time)
    {
        header("Location:{$url}");
    }
}
