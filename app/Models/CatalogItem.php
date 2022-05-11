<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int  id
 * @property string name
 * @property string vendor_code
 * @property string avatar
 * @property int catalog_id
 * @property boolean is_new
 * @property boolean is_popular
 */

class CatalogItem extends Model
{
    protected $table = 'catalog_item';

    protected $fillable = [
        'name', 'vendor_code', 'avatar', 'catalog_id', 'is_new', 'is_popular'
    ];

    public function parent(): HasOne
    {
        return $this->hasOne(Catalog::class, 'id', 'catalog_id');
    }

    public function getEditLink():string
    {
        return route('admin.catalog.items.edit', ['id' => $this->id]);
    }
}
