<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Vendor;
use Livewire\Component;

class AdminVendorList extends Component
{
    public int $itemsPerPage = 40;

    public function deleteItems(int $id)
    {
        $vendorItem = Vendor::find($id);
        $vendorItem->delete();
    }

    public function render()
    {
        $vendor_list = Vendor::orderBy('created_at', 'desc')->paginate($this->itemsPerPage);
        return view('livewire.admin.pages.admin-vendor-list', compact('vendor_list'))->layout('components.layouts.admin.authorized');
    }
}
