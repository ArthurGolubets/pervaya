<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string phone
 * @property string email
 * @property string message
 *
 * @property boolean is_moderated
 */


class Questions extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'name','phone', 'email', 'message', 'is_moderated'
    ];
}
