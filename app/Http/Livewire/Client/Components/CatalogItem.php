<?php
namespace App\Http\Livewire\Client\Components;

use Livewire\Component;

class CatalogItem extends Component
{
    public $item;

    public function mount(int $id)
    {
        $this->item = \App\Models\CatalogItem::find($id);
    }

    public function render()
    {
        return view('livewire.client.components.catalog-item');
    }
}
