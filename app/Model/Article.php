<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Article extends Model
{
    protected $table = 'article';

    public $timestamps = false;
}

