<?php

namespace App\Action\Admin\Category;

use App\Model\Category;
use Boot\Support\Action;

class ListAction extends Action
{
    public function list()
    {
        $data['list']  = Category::query()->offset($this->offset)->limit($this->limit)->get();
        $data['total'] = Category::query()->count();

        return msg(200, 'success', $data);
    }
}