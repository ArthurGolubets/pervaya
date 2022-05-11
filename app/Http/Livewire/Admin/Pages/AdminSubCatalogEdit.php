<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;

class AdminSubCatalogEdit extends Component
{
    public function render()
    {
        return view('livewire.admin.pages.admin-sub-catalog-edit')->layout('components.layouts.admin.authorized');
    }
}
