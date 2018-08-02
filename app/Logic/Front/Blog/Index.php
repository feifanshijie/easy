<?php

namespace App\Action\Front\Blog;

use App\Model\Book;
use Boot\Support\Action;

class Index extends Action
{
    public function view()
    {
        $data = Book::query()->get();

        return msg(200, 'success', $data);
    }
}