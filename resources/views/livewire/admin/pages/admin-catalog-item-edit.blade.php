<div>
    <section class="header">
        <div class="row w-100">
            <div class="col-12">
                <div class="route-back d-flex flex-wrap p-2 align-items-end">
                    <h5 class=" m-0">{!!$isEditMode?"Редактирование товара: <b>{$item->id}</b>":'Добавление товара'!!}</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="content mt-4">
        <form action="#" wire:submit.prevent="save" class="w-100 px-2">
            <div class="row w-100">
                <div class="col-lg-3 col-12 mb-2">
                    <div class="input-group d-flex flex-column modal-input-field">
                        <label for="image">Выберите изображение
                            @if($item->avatar)
                                @if($avatar)
                                    <div class="p-2 no-image">
                                        <img src="{{$avatar->temporaryUrl()}}" alt="" class="img-fluid">
                                        <button wire:click.prevent="deleteImage" class="no-image__delete">
                                            <i class="far fa-times fa-2x"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="p-2 no-image">
{{--                                        {{dump($item->avatar)}}--}}
                                        <img src="{{asset($item->avatar)}}" alt="" class="img-fluid">
                                        <button wire:click.prevent="deleteImage(true)" class="no-image__delete">
                                            <i class="far fa-times fa-2x"></i>
                                        </button>
                                    </div>
                                @endif
                            @else
                                @if($avatar)
                                    <div class="p-2 no-image">
                                        <img src="{{$avatar->temporaryUrl()}}" alt="" class="img-fluid">
                                        <button wire:click.prevent="deleteImage" class="no-image__delete">
                                            <i class="far fa-times fa-2x"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="no-image">
                                        <i class="fas fa-plus no-image__icon fa-2x"></i>
                                        <span class="no-image__title">Добавить изображение</span>
                                    </div>
                                @endif
                            @endif
                        </label>
                        <input type="file" wire:model.defer="avatar" id="image" class="d-none">
                        @error('avatar') <span class="error">{{ $message }}</span>  @enderror
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <form wire:submit.prevent="save" class="w-100">
                        <div  class="row">
                            <div class="col-12 mb-2">
                                <div class="input-group d-flex flex-column modal-input-field">
                                    <label>Название товара</label>
                                    <input type="text" class="styled-rounded-accented-input" wire:model="item.name">
                                    @error('item.name') <span class="error">{{ $message }}</span>  @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="input-group d-flex flex-column modal-input-field">
                                    <label>Артикул</label>
                                    <input type="text" class="styled-rounded-accented-input" wire:model="item.vendor_code">
                                    @error('item.vendor_code') <span class="error">{{ $message }}</span>  @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="input-group d-flex flex-column modal-input-field">
                                    <label>Описание</label>
                                    <textarea type="text" class="styled-rounded-accented-input" wire:model="item.description"></textarea>
                                    @error('item.description') <span class="error">{{ $message }}</span>  @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="input-group d-flex flex-column modal-input-field">
                                    <label>Производитель</label>
                                    <select name="item_type-dropdown" wire:change="$set('item.vendor_id',$event.target.value)">
                                        <option value="0">Выберите производителя</option>
                                        @foreach(\App\Models\Vendor::all() as $category)
                                            <option @if($item->vendor_id == $category->id) selected @endif value="{{$category->id}}">{{$category->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('item.vendor_id') <span class="error">{{ $message }}</span>  @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="w-100">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-5 col-12">
                                            <div class="w-100 d-flex  align-items-center">
                                                <input type="checkbox" id="new" @if($isNew) checked @endif wire:model="isNew">
                                                <label class="ms-2 fs-6" for="new"  >Новинка</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-5 col-12">
                                            <div class="w-100 d-flex  align-items-center">
                                                <input type="checkbox" id="popular" wire:model="isPopular" @if($isPopular) checked @endif>
                                                <label class="ms-2 fs-6" for="popular">Популярное</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>


            </div>
            <div class="row w-100">
                <div class="col-12 my-3">
                    @if($isEditMode)
                        <livewire:admin.components.gallery :tname="$temp_id" :model-type="\App\Models\CatalogItem::class" is-edit="1" :model-id="$item->id"/>
                    @else
                        <livewire:admin.components.gallery :tname="$temp_id" :model-type="\App\Models\CatalogItem::class"/>
                    @endif
                </div>
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
@push('styles')
    <link rel="stylesheet" href="{{asset('shared/assets/fancybox/css/fancybox.css')}}">
@endpush
@push('scripts')
    <script src="{{asset('shared/assets/choices.js/scripts/choices.min.js')}}"></script>
    <script src="{{asset('shared/assets/fancybox/js/fancybox.min.js')}}"></script>
    <script>
        (()=>{
            (()=>{

                let element = document.querySelector('[name="item_type-dropdown"]');

                let choiceInstance = new Choices(element,{
                    removeItemButton: true,
                    searchPlaceholderValue: 'Введите название',
                    noChoicesText: 'Нед доступных категорий'
                });

                window.addEventListener('updateChoise', () => {
                    new Choices(document.querySelector('[name="item_type-dropdown"]'))
                })

            })();
        })();
    </script>
@endpush
@push('adminFunctionsExtension')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                adminFunctions.tinymceInstances()['body'].on('change', () => {
                    @this.set('item.body', adminFunctions.tinymceInstances()['body'].getContent())
                })
            }, 200);
        })
    </script>
@endpush

