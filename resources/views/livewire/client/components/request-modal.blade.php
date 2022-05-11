<div class="modal fade" id="exampleModal" tabindex="-1" wire:ignore.self aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="w-100 reqmodal position-relative d-flex flex-column py-3 px-4">
                <span data-bs-dismiss="modal" aria-label="Close" class="reqmodal__btn-close position-absolute text-white"><i class="far fa-times"></i></span>
                <h4 class="text-white reqmodal__title">Получить консультацию</h4>
                <p class="reqmodal__subtitle text-white">Mы вам перезвоним, что бы уточнить все детали для просчета заказа.</p>

                <form action="" wire:submit.prevent="save" class="w-100 d-flex flex-column reqmodal__from">
                    <div class="reqmodal__from-item d-flex flex-column mb-3">
                        <input type="text" placeholder="Как вас зовут?" wire:model="modal.name" class="px-2 py-2 w-100">
                        @error('modal.name')<span class="reqmodal__error">{{$message}}</span>@enderror
                    </div>

                    <div class="reqmodal__from-item d-flex flex-column mb-3">
                        <input type="text" placeholder="Ваш номер телефона" wire:model="modal.phone" id="request_phone" class="px-2 py-2 w-100">
                        @error('modal.phone')<span class="reqmodal__error">{{$message}}</span>@enderror
                    </div>

                    <div class="reqmodal__from-item d-flex flex-column mb-2">
                        <textarea name="comment" wire:model="modal.comment" placeholder="Ваш адрес и желаемая дата" class="w-100" id="comment" cols="30" rows="10"></textarea>
                        @error('modal.comment')<span class="reqmodal__error">{{$message}}</span>@enderror
                    </div>

                    <div class="w-100 d-flex justify-content-start align-items-center">
                        <button type="submit" class="btn-accent reqmodal__btn-send">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
