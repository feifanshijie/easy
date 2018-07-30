<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Asset extends Model
{
    protected $table = 'asset';

    public $timestamps = true;
}

