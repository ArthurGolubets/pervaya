<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class AdminSliderList extends Component
{
    public function deleteItem($id)
    {
        $slide = Slider::find($id);
        $slide->delete();
    }

    public function render()
    {
        $sliderList = Slider::all();
        return view('livewire.admin-slider-list', compact('sliderList'))->layout('components.layouts.admin.authorized');
    }
}
