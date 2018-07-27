<?php

namespace Boot\Support;

use Boot\Service;

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
}
