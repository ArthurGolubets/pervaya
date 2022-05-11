<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Vendor;
use Livewire\Component;

class AdminVendorsEdit extends Component
{
    public Vendor $vendor;
    public bool $isEditMode = false;

    public function rules(){
        return [
            'vendor.vendor_name' => 'required|string'
        ];
    }

    public function cancel()
    {
        return redirect()->route('admin.vendors.list');
    }

    public function save()
    {
        $this->vendor->save();
        return redirect()->route('admin.vendors.list');
    }

    public function message(){
        return [
            'vendor.vendor_name.required' => 'Это обязательное поле!',
            'vendor.vendor_name.string' => 'Неверный формат данных!',
        ];
    }

    public function mount(?int $id = null)
    {
        $this->isEditMode = $id != null;
        $this->vendor = $this->isEditMode ? Vendor::find($id) : new Vendor();
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-vendors-edit')->layout('components.layouts.admin.authorized');
    }
}
