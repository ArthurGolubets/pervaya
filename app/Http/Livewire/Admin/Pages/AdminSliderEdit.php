<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSliderEdit extends Component
{
    use WithFileUploads;

    public bool $isEditMode = false;
    public $avatar;

    public Slider $item;

    public function rules(){
        return [
            'item.name' => 'required|string',
            'item.link' => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'item.name.string'    => 'Не верный формат данных!',
            'item.name.required'  => 'Это обязательное поле!',
        ];
    }

    public function cancel()
    {
        return redirect()->route('admin.slide.list');
    }

    public function deleteImage($isAvatar = false)
    {
        if($isAvatar){
            $fName = explode('/',$this->item->avatar);
            $fName = end($fName);

            \Storage::delete('public/avatar/'.$fName);
            $this->item->avatar = null;
            $this->item->save();

        }
        else $this->avatar = null;
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

        $this->item->save();
        return redirect()->route('admin.slide.list');
    }

    public function mount(?int $id = null)
    {
        $this->isEditMode = $id != null;
        $this->item = $this->isEditMode ? Slider::find($id) : new Slider();
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-slider-edit')->layout('components.layouts.admin.authorized');
    }
}
