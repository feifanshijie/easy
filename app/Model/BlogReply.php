<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class BlogReply extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'blog_reply';

    public $timestamps = false;
}

