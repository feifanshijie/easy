<?php

namespace Boot\Support;

class Paginate
{
    public $page = 1;

    public $limit = 10;

    public $offset = 0;

    public function __construct()
    {
        $this->page   = request('page');
        $this->offset = ($this->page - 1) * $this->limit;
    }
}
