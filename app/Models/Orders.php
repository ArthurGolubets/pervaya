<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string phone
 * @property string comment
 */


class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'name', 'phone', 'comment'
    ];
}
