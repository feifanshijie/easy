<?php

namespace Boot;

class Service
{
    public function redis()
    {
        return new \Predis\Client();
    }
}