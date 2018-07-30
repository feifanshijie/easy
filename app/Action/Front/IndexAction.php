<?php

namespace App\Action\Front;

use App\Model\Article;
use App\Model\Book;
use Boot\Support\Action;

class IndexAction extends Action
{
    public function view()
    {
        $data = Book::query()->get();
        return msg(200, 'success', $data);
    }
}