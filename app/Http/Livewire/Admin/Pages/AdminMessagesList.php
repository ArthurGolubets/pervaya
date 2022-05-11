<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Questions;
use Livewire\Component;

class AdminMessagesList extends Component
{
    public int $itemPerPage = 30;
    public Questions $modal;

    public function mount()
    {
        $this->modal = new Questions();
    }

    public function showModalOrder(int $id)
    {
        $this->modal = Questions::find($id);
        $this->dispatchBrowserEvent('showModalorder');
    }

    public function deleteItem(int $id)
    {
        $itemDelete  = Questions::find($id);
        $itemDelete->delete();
    }

    public function render()
    {
        $messageList = Questions::orderBy('created_at', 'desc')->paginate($this->itemPerPage);
        return view('livewire.admin.pages.admin-messages-list', compact('messageList'))->layout('components.layouts.admin.authorized');
    }
}
