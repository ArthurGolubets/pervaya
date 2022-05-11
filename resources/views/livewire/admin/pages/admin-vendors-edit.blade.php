<div>
    <section class="header">
        <div class="row w-100">
            <div class="col-12">
                <div class="route-back d-flex flex-wrap p-2 align-items-end">
                    <h5 class=" m-0">{!!$isEditMode?"Редактирование производителя: <b>{$vendor->id}</b>":'Добавление производителя'!!}</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="content mt-4">
        <form action="#" wire:submit.prevent="save" class="w-100 px-2">
            <div class="row w-100">
                <div class="col-lg-12 col-12">
                    <form wire:submit.prevent="save" class="w-100">
                        <div  class="row">
                            <div class="col-12 mb-2">
                                <div class="input-group d-flex flex-column modal-input-field">
                                    <label>Название название производителя</label>
                                    <input type="text" class="styled-rounded-accented-input" wire:model="vendor.vendor_name">
                                    @error('vendor.vendor_name') <span class="error">{{ $message }}</span>  @enderror
                                </div>
                            </div>
                    </form>
                </div>
            </div>

            <div class="row w-100 my-2">
                <div class="col-12 d-flex justify-content-start">
                    <div>
                        <button type="button" class="btn btn-back" data-bs-dismiss="modal" wire:click="cancel">Отмена</button>
                        <button type="submit" wire:click.prevent="save" class="btn btn-save">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

