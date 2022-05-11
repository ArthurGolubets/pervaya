<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Orders;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    private function extractStoryBoard(Collection $collection)
    {
        dd($collection->groupBy(fn($x) => $x->created_at->toDateString())
            ->map(fn($value, $key) => [\Carbon\Carbon::createFromDate($key)->getPreciseTimestamp(3), $value->count()])
            ->values()
            ->sortBy(fn($item) => $item[0])
            ->values());

        return $collection->groupBy(fn($x) => $x->created_at->toDateString())
            ->map(fn($value, $key) => [\Carbon\Carbon::createFromDate($key)->getPreciseTimestamp(3), $value->count()])
            ->values()
            ->sortBy(fn($item) => $item[0])
            ->values();
    }


	public function render()
	{
        $orderAllChart = Orders::all();

        $OrdersAll = Orders::all()->count();
        $orderPerMonth = Orders::where('created_at','>=' ,Carbon::now()->subMonth()->toDateString())->get()->count();
        $orderPerWeek = Orders::where('created_at','>=' ,Carbon::now()->subWeek()->toDateString())->get()->count();


        return view( 'livewire.admin.pages.dashboard', compact('orderAllChart', 'orderPerWeek', 'orderPerMonth', 'OrdersAll'))->layout('components.layouts.admin.authorized');
	}
}
