<?php

namespace App\Action;

use App\Model\Blog;
use App\Model\BlogCategory;
use Boot\Support\Action;

class IndexAction extends Action
{
    public function index()
    {
        $list = Blog::query()->with('label')->get();

        $data['list'] = $list;
        $data['category'] = BlogCategory::query()->limit(6)->get();
        $data['hot'] = '热议';
        $data['statistics'] = '';

        return msg(200, 'success', $data);
    }
}