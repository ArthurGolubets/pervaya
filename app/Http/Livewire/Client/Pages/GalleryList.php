<?php

namespace App\Http\Livewire\Client\Pages;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class GalleryList extends Component
{
    public ?Collection $items = null;

    public string $typesPosition = 'left';

    public function render()
    {
        return view('livewire.client.pages.gallery-list');
    }
}
