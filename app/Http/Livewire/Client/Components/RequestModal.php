<?php

namespace App\Http\Livewire\Client\Components;

use App\Models\Orders;
use http\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RequestModal extends Component
{
    public Orders $modal;

    public function rules()
    {
        return [
            'modal.name' => 'required|string',
            'modal.phone' => 'required|string|min:16',
            'modal.comment' => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'modal.*.required' => 'Это поле обязательное!',
            'modal.*.string' => 'Неправильный формат',
            'modal.phone.min' => 'Неправильный номер',
        ];
    }

    public function mount(){
        $this->modal = new Orders();
    }

    public function save()
    {
        $this->validate();
        $this->modal->save();

        $token = setting( 'telegram.token') ?? 0;
        $chatID = setting('telegram.chat_id') ?? 0;

        $msg = "У вас новая заявка:
Имя: {$this->modal->name}
Телефон: {$this->modal->phone}
Коментарий: {$this->modal->comment}";

        $text = urlencode($msg);


        $URL = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatID}&text={$text}&parse_mode=HTML";
        Http::get($URL);

//        dd($chatID);

        $this->modal = new Orders();
        $this->dispatchBrowserEvent('sendRequestOrder');
    }

    public function render()
    {
        return view('livewire.client.components.request-modal');
    }
}
