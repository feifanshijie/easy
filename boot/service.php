<?php

namespace Boot;


class Service
{
    public function redis()
    {
        return new \Predis\Client();
    }

    public function paginate()
    {
        return new \Boot\Support\Paginate();
    }
}