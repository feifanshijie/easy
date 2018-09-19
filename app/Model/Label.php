<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Label extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'label';

    public $timestamps = false;

    public function label()
    {
//        return $this->hasMany('App\Model\BlogLabel', 'blog_id', 'id')->leftJoin('');
    }
}

