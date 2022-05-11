<?php

namespace App\Http\Livewire\Admin\Components\Tree;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\Component;

class TreeItem extends Component
{
    /**
     * @var Model
     */
    public Model $item;

    /**
     * @var bool
     */
    public bool $hasChildren = false;

    /**
     * @var string|null
     */

    public ?string $itemCreateLink = '';

    /**
     * @var bool
     */
    public bool $showChildren = false;

    /**
     * @var string|null
     */
    public ?string $editLink = null;
    /**
     * @var string|null
     */
    public ?string $createLink = null;

    /**
     * @var Collection|null
     */
    public ?Collection $children = null;

    /**
     * @var bool
     */
    public bool $showItemsChildren = false;

    /**
     * @var bool
     */
    public bool $hasItemsChildren = false;

    /**
     * @var bool
     */
    public bool $isCatalog = false;

    /**
     * @var Collection|null
     */
    public ?Collection $childrenItem = null;


    public function toggleShowItems() :void
    {

        $this->showItemsChildren = !$this->showItemsChildren;
        $this->childrenItem = $this->showItemsChildren ? $this->item->getChildrenItems : null;

    }

    public function toggleShowChildren(): void
    {
        $this->showChildren = !$this->showChildren;
        $this->children = $this->showChildren ? $this->item->items : null;
    }

    /**
     * @param $item
     */
    public function deleteConfirm($item): void
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'item' => $item,
        ]);
    }

    /**
     * @param $itemId
     * @param $modelClass
     */
    public function deleteItem($itemId, $modelClass):void
    {
        $item = $modelClass::find($itemId);
        $item->delete();
        $this->dispatchBrowserEvent('deletedeItems');
    }

    public function toggleChildren()
    {
        $this->toggleShowChildren();
        $this->toggleShowItems();
    }

    public function mount(): void
    {
        if(method_exists($this?->item,'hasChildren') ){
            $this->hasChildren = $this?->item?->hasChildren();
        }

        if(method_exists($this?->item,'getEditLink') ){
            $this->editLink = $this?->item?->getEditLink();
        }

        if(method_exists($this?->item,'getCreateLink') ){
            $this->createLink = $this?->item?->getCreateLink();
        }

        if(method_exists($this?->item,'isCatalog') ){
            $this->isCatalog = $this?->item?->isCatalog();
        }

        if(method_exists($this?->item, 'catalogItemsCount')){
            $this->hasItemsChildren = $this?->item?->catalogItemsCount();
        }

        if(method_exists($this?->item, 'getCreateItemLink')){
            $this->itemCreateLink = $this?->item?->getCreateItemLink();
        }

        /*if(method_exists($this?->item, 'catalogItems')){
            $this->itemsChild  = $this?->item?->catalogItems( );
        }*/
    }

    /**
     * @return View|Factory
     */
    public function render(): View|Factory
    {
//        dd($this->item->is);
        return view( 'livewire.admin.components.tree.tree-item' );
    }
}
