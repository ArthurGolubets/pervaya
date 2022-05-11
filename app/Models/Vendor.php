<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string vendor_name
 */

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
        'vendor_name',
    ];

    public function getItemsCount() :int
    {
        return $this->hasMany(CatalogItem::class, 'vendor_id', 'id')->count();
    }
}
