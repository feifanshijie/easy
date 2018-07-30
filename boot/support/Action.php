<?php

namespace Boot\Support;

use Boot\Service;

abstract class Action extends Base
{
    protected $limit = null;

    protected $offset = null;

    protected $service = null;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function model(string $model, string $method)
    {
        return $model::$method();
    }
}
