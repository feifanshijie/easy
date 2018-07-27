<?php

namespace App\Action;

use App\Model\Article;
use App\Model\Book;
use Boot\Support\Action;

class IndexAction extends Action
{
    public function index()
    {
        $data = Book::query()->get();
        return msg(200, 'success', $data);
    }

    public function test()
    {
        $data['title'] = '测试DEMO';
        $data['list']  = Article::query()
            ->select(['id', 'title', 'info', 'pv', 'like'])
            ->get();

        return msg(200, 'success', $data);
    }
}