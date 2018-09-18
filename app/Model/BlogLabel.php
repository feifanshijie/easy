<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class BlogLabel extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'blog_label';

    public $timestamps = false;
}

