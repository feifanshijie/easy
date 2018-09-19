<?php

namespace App\Action;

use App\Model\Blog;
use App\Model\BlogCategory;
use Boot\Support\Action;

class IndexAction extends Action
{
    public function index()
    {
        $list = Blog::query()
            ->with(['label' => function($query){
                $query->leftJoin('label', 'label.id', 'blog_label.label_id')
                    ->select('label.id', 'blog_label.blog_id', 'label.name');
            }])
            ->with(['reply_user' => function($query){
                $query->leftJoin('user', 'user.id', 'blog_reply.user_id')
                    ->select('user.nickname', 'user.avatar', 'blog_reply.blog_id');
            }])
            ->get();

        $data['list'] = $list;
        $data['category'] = BlogCategory::query()->limit(6)->get();
        $data['hot'] = '热议';
        $data['statistics'] = '';

        return msg(200, 'success', $data);
    }
}