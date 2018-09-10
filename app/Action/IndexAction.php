<?php

namespace App\Action;

use App\Model\Blog;
use App\Model\BlogCategory;
use Boot\Support\Action;

class IndexAction extends Action
{
    public function index()
    {
        $data['list'] = Blog::query()->get();
        $data['category'] = BlogCategory::query()->get();

        return msg(200, 'success', $data);
    }
}