<?php

namespace App\Action;

use App\Model\Blog;
use App\Model\BlogCategory;
use Boot\Support\Action;

class IndexAction extends Action
{
    public function index()
    {
        $list = Blog::query()->get();

        $data['list'] = $list;
        $data['category'] = BlogCategory::query()->get();


        return msg(200, 'success', $data);
    }
}