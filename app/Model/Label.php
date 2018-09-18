<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Blog extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'blog';

    public $timestamps = false;

    public function label()
    {
        return $this->hasMany('App\Model\BlogLabel', 'blog_id', 'id')->leftJoin('');
    }
}

