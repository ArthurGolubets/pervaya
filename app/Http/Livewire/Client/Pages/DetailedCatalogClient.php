<?php

namespace App\Http\Livewire\Client\Pages;

use App\Models\Catalog;
use App\Models\Vendor;
use Livewire\Component;

class DetailedCatalogClient extends Component
{
    public  $catalogs;

    public ?string $slug = '';
    public ?int $catalog_id = null;

    public int $selectedVendor = 0;

    public function setVendorCode($id)
    {
        $this->selectedVendor = $id;

    }

    public function mount(int $id, string $slug)
    {
       $this->catalog_id = $id;
       $this->slug = $slug;
       $this->catalogs = Catalog::whereNull('parent_id')->orderBy('priority','asc')->get();
    }



    public function render()
    {
        $catalog = Catalog::findWithIdAndSlug($this->catalog_id, $this->slug);

        $catalogItems = $catalog->getAllItemsList();

        if($this->selectedVendor != 0) $catalogItems = $catalogItems->where('vendor_id', $this->selectedVendor);
        $vendors = $catalog->getVendor();

        return view('livewire.client.pages.detailed-catalog-client', compact('catalog', 'vendors', 'catalogItems'))->layout('components.layouts.client.app', ['titlePage' => $catalog->title!=''?$catalog->title:null, 'keywordsPage' => $catalog->keywords!=''?$catalog->keywords:null, 'descriptionPage' => $catalog->description!=''?$catalog->description:null]);
    }
}
