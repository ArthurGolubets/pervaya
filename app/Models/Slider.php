<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string avatar
 * @property string link
 */

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = [
        'name', 'avatar', 'link'
    ];
}
