<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Book extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'book';

    public $timestamps = false;
}

