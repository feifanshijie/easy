<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class BlogCategory extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'blog_category';

    public $timestamps = false;
}

