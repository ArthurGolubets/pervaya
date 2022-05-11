<form wire:submit.prevent="save" class="col-12 mt-1" >
    <div class="w-100 d-flex flex-column">
        <div class="contacts-form__field d-flex flex-column">
            <input type="text" wire:model="questForm.name" class="contacts-form__input py-2" placeholder="Как вас зовут?">
            @error('questForm.name') <span class="error__text">{{$message}}</span> @enderror
        </div>
        <div class="contacts-form__field d-flex flex-column">
            <input type="tel" id="phone_item" wire:model="questForm.phone" class="contacts-form__input py-2" placeholder="Ваш номер телефона">
            @error('questForm.phone') <span class="error__text">{{$message}}</span> @enderror
        </div>
        <div class="contacts-form__field d-flex flex-column">
            <input type="email" wire:model="questForm.email" class="contacts-form__input py-2" placeholder="Ваш e-mail">
            @error('questForm.email') <span class="error__text">{{$message}}</span> @enderror
        </div>
        <div class="contacts-form__field d-flex flex-column">
            <textarea name="" wire:model="questForm.message" id="" cols="30" rows="10" class="contacts-form__input py-2" placeholder="Сообщение"></textarea>
            @error('questForm.message') <span class="error__text">{{$message}}</span> @enderror
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="px-4 py-1 btn btn-accent">Отправить</button>
        </div>
    </div>
</form>

@push('scripts')


    <script>
        var element = document.getElementById('phone_item');
        var maskOptions = {
            mask: '+{7}(000)000-00-00'
        };
        var phone = IMask(element, maskOptions);

        window.addEventListener('submitFormQuest', ()=>{
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            })

            Toast.fire({
                icon: 'success',
                title: 'Вопрос успешно отправлен!'
            })
        })
    </script>
@endpush
