<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Catalog;
use Livewire\Component;

class AdminCatalogList extends Component
{
    public function render()
    {
        $catalog = Catalog::where('parent_id', null)->orderBy('priority','asc')->get();
        return view('livewire.admin.pages.admin-catalog-list',compact('catalog'))->layout('components.layouts.admin.authorized');
    }
}
