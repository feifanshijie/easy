<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class BlogLike extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'blog_like';

    public $timestamps = false;
}

