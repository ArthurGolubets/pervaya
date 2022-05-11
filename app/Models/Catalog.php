<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class Catalog extends Model
{
    protected $table = 'catalog';

    public static function findWithIdAndSlug(int $id, string $slug)
    {
        return self::where('id', $id)->where('slug', $slug)->first();
    }

    public function isCatalog():bool
    {
        return true;
    }

    public function hasChildren(): int
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->count();
    }

    public function getEditLink(): string
    {
        return route('admin.catalog.edit', ['id' => $this->id]);
    }

    public function getCreateLink(): string
    {
        return route('admin.catalog.create').'?selectedCategory='.$this->id;
    }

    public function getCreateItemLink() :string{
        return route('admin.catalog.items.create').'?selectedCategory='.$this->id;;
    }

    public function items(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('priority', 'asc');
    }

    public function getChildrenItems(){
        return $this->hasMany(CatalogItem::class, 'catalog_id', 'id')->orderBy('priority', 'asc');
    }

    public function catalogItemsCount(): int
    {
        return $this->hasMany(CatalogItem::class, 'catalog_id', 'id')->count();
    }

    public function itms(): HasManyThrough|HasMany
    {
        $hasThrough = $this->hasManyThrough(CatalogItem::class, self::class, 'parent_id', 'catalog_id', 'id','id')->orderBy('priority', 'asc');
        $hasMany = $this->hasMany(CatalogItem::class, 'catalog_id', 'id')->orderBy('priority');
        return $hasThrough->count() ? $hasThrough : $hasMany;
    }

/*    public function itmsVendor()
    {
        $result = collect();
        $hasThrough = $this->hasManyThrough(CatalogItem::class, self::class, 'parent_id', 'catalog_id', 'id','id')->orderBy('priority', 'asc')->get()->map(function ($item) use ($result){
            $result->add($item);
            return $item;
        });
        $hasMany = $this->hasMany(CatalogItem::class, 'catalog_id', 'id')->orderBy('priority')->get()->map(function ($item) use ($result){
            $result->add($item);
            return $item;
        });



        return $result;
    }*/


    public function getVendor()
    {
        $items = $this->getAllItemsList()->groupBy('vendor_id')->keys();
        return Vendor::whereIn('id', $items)->get();
    }

    public function getAllItemsList()
    {
        return CatalogItem::where('path', 'like', "%#{$this->id}#%")->get();
    }
}
