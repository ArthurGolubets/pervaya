<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Http\Livewire\Client\Components\CatalogItem;
use App\Models\Catalog;
use App\Models\CategoryItem;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCatalogEdit extends Component
{
    use WithFileUploads;

    public bool $isEditMode = false;

    public ?string $temp_id = null;

    public Catalog $item;

    public $avatar;

    public ?int $selectedCategory = null;

    protected $queryString = [
        'selectedCategory'=> [
            'except' => '',
        ],
    ];

    public function rules()
    {
        return [
            'item.name'         => 'required|string',
            'item.title'        => 'nullable|string',
            'item.keywords'     => 'nullable|string',
            'item.description'  => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'item.name.required'    => 'Это обязательное поле!',
            'item.*.string'         => 'Неверный формат данных!',
        ];
    }

    public function deleteImage( bool $isImage = false )
    {
        if($isImage){
            $this->item->avatar = null;
        } else {
            $this->avatar = null;
        }
    }

    public function mount(?int $id = null)
    {
        $this->isEditMode = $id != null;
        $this->item = $this->isEditMode ? Catalog::find($id) : new Catalog();

        $this->temp_id = $this->isEditMode? null : uniqid();
    }

    public function cancel() :Redirector
    {
        return redirect()->route('admin.catalog.list');
    }

    public function save()
    {
        $this->validate();

        if($this->avatar){
            $fName = explode('/',$this->item->avatar);
            $fName = end($fName);

            \Storage::delete('public/avatar/'.$fName);

            $fileName = uniqid().".".$this->avatar->extension();
            $tmp = $this->avatar->storeAs('public/avatar', $fileName);
            $this->item->avatar = "storage/avatar/{$fileName}";
        }

        $this->item->slug = Str::slug($this->item->name, '-');

        if (!$this->isEditMode){
            $this->item->parent_id  = $this->selectedCategory;
        }

        $parent = null;
        if($this->item->parent_id != null) $parent = Catalog::find($this->item->parent_id);

        $this->item->save();

        $this->item->path = $parent->path . '#'.$this->item->id . '#';

        $this->item->save();

        return redirect()->route('admin.catalog.list');
    }


    public function render()
    {
        return view('livewire.admin.pages.admin-catalog-edit')->layout('components.layouts.admin.authorized');
    }
}
