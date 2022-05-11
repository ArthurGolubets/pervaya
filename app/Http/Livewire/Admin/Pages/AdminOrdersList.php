<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Orders;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrdersList extends Component
{
    use WithPagination;

    public int $itemsPerPage = 30;
    public ?Orders $modal;

    public function mount()
    {
        $this->modal = new Orders();
    }

    public function  showModalOrder($id){
        $this->modal = Orders::find($id);
        $this->dispatchBrowserEvent('showModalorder');
    }

    public function deleteItem($id)
    {

        $order = Orders::find($id);
        $order->delete();
//        dd(123);
    }

    public function render()
    {
        $ordersList = Orders::orderby('created_at', 'desc')->paginate($this->itemsPerPage);
        return view('livewire.admin.pages.admin-orders-list', compact('ordersList'))->layout('components.layouts.admin.authorized');

    }
}
