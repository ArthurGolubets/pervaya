<?php

namespace App\Http\Livewire\Client\Components;

use App\Models\Questions;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class QuestionForm extends Component
{

    public Questions $questForm;

    public function rules()
    {
        return [
            'questForm.name' => 'required|string',
            'questForm.phone' => 'required|string|min:16',
            'questForm.email' => 'email|nullable',
            'questForm.message' => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'questForm.*.required' => 'Это обязательное поле!',
            'questForm.*.string' => 'Неверный формат данных.',
            'questForm.email.email' => 'Проверьте правильность почты',
            'questForm.phone.min' => 'Неправильный номер телефона',
        ];
    }

    public function save()
    {
        $this->validate();

        $this->questForm->save();

        $token = setting( 'telegram.token') ?? 0;
        $chatID = setting('telegram.chat_id') ?? 0;

        $msg = "У вас новый вопрос:
Имя: {$this->questForm->name}
Телефон: {$this->questForm->phone}
Почта: {$this->questForm->email}
Коментарий: {$this->questForm->message}";

        $text = urlencode($msg);

        $URL = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatID}&text={$text}&parse_mode=HTML";
        Http::get($URL);

        $this->questForm = new Questions();
        $this->dispatchBrowserEvent('submitFormQuest');
    }

    public function mount()
    {
        $this->questForm = new Questions();
    }

    public function render()
    {
        return view('livewire.client.components.question-form');
    }
}
