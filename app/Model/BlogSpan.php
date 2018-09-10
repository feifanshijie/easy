<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class BlogSpan extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'blog_span';

    public $timestamps = false;
}

