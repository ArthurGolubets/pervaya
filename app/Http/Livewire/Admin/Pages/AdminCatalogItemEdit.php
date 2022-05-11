<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Catalog;
use App\Models\CatalogItem;
use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Symfony\Component\String\s;

class AdminCatalogItemEdit extends Component
{
    use WithFileUploads;

    public ?int $selectedCategory = null;

    public bool $isEditMode = false;

    public string $temp_id;

    public CatalogItem $item;

    public  $avatar;

    public bool $isPopular = false;

    public bool $isNew = false;

    public bool $delImg = false;

    public function rules()
    {
        return [
            'item.name' => 'required|string',
            'item.vendor_code' => 'nullable|string',
            'item.description' => 'nullable|string',
            'isPopular' => 'nullable|boolean',
            'isNew' => 'boolean',
            'item.vendor_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'item.*.required' => 'Это обязательное поле!',
            'item.*.string'      => 'Неверный формат данных',
            'item.*.integer'      => 'Неверный формат данных',
        ];
    }

    protected $queryString = [
        'selectedCategory'=> [
            'except' => '',
        ],
    ];

    public function deleteImage( bool $isImage = false )
    {

        if($isImage){
            $this->item->avatar = null;
            $this->delImg = true;
        } else {
            $this->avatar = null;
        }
    }


    public function mount(?int $id = null)
    {
        $this->isEditMode = $id != null;
        $this->item = $this->isEditMode ? CatalogItem::find($id) : new CatalogItem();

        $this->isNew = $this->isEditMode ? $this->item->is_new : false;
        $this->isPopular = $this->isEditMode ? $this->item->is_popular : false;
//
        $this->temp_id = uniqid();
    }

    public function updated()
    {
        $this->dispatchBrowserEvent('updateChoise');
    }


    public function save()
    {
        $this->validate();

        if(!$this->isEditMode) $this->item->catalog_id = $this->selectedCategory;

        $this->item->is_new = $this->isNew;
        $this->item->is_popular = $this->isPopular;

        if($this->delImg) $this->item->avatar = null;

        if($this->avatar){
            $fName = explode('/',$this->item->avatar);
            $fName = end($fName);

            \Storage::delete('public/avatar/'.$fName);

            $fileName = uniqid().".".$this->avatar->extension();
            $tmp = $this->avatar->storeAs('public/avatar', $fileName);
            $this->item->avatar = "storage/avatar/{$fileName}";
        }


        $this->item->save();

        $parent = null;
        if($this->item->catalog_id != null) {
            $parent = Catalog::find($this->item->catalog_id);
            $this->item->path = $parent->path;
            $this->item->save();
        }

        $gallery = Gallery::findByModelTypeAndTempId(CatalogItem::class, $this->temp_id);

        foreach ($gallery as $img){
            $img->temp_id = null;
            $img->model_id = $this->item->id;
            $img->save();
        }

        return redirect()->route('admin.catalog.list');
    }

    public function cancel()
    {
        return redirect()->route('admin.catalog.list');
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-catalog-item-edit')->layout('components.layouts.admin.authorized');
    }
}
