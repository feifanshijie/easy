<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class User extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'user';

    public $timestamps = false;
}

