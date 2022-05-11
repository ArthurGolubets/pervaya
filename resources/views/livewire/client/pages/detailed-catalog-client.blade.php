<div>
    <section id="catalogPage" class="mt-4 container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="w-100 d-flex flex-wrap breadcrumb" >
                    <a href="{{route('home')}}" class="breadcrumb-item">Главная</a>
                    <a href="{{route('catalog')}}" class="breadcrumb-item">Каталог</a>
                    <a href="javascript:void(0)" class="breadcrumb-item">{{$catalog->name}}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="w-100 d-flex align-items-end">
                    <h3 class="section-title">{{$catalog->name}}</h3>
                    <div class="section-line"></div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3 col-12">
                <div class="w-100">
                    @foreach($catalogs as $cat)
                        @if($cat->hasChildren())
                            <x-components.tree.parent-element :cat="$cat" is-active="{{$catalog->id}}" />
                        @else
                            <x-components.tree.child-element :itm="$cat" active="{{$catalog->id}}"/>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-12 d-block d-md-none">
                <hr>
            </div>
            <div class="col-lg-9 mt-3 mt-md-0 col-12">
                @if($vendors->count() > 0)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-6 mb-2">
                            <div class="w-100 catalog__items d-flex justify-content-center">
                                <a href="" wire:click.prevent="setVendorCode(0)" class="catalog__items-link @if($selectedVendor == 0) active @endif p-2">Все</a>
                            </div>
                        </div>
                        @foreach($vendors as $itm)
                            <div class="col-lg-3 col-md-4 col-6 mb-2">
                                <div class="w-100 catalog__items d-flex justify-content-center">
                                    <a href="" wire:click.prevent="setVendorCode({{$itm->id}})" class="catalog__items-link @if($selectedVendor == $itm->id) active @endif p-2">{{$itm->vendor_name}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="row mt-4">
                    @if($catalogItems->count() > 0)
                        @foreach($catalogItems as $item)
                            <livewire:client.components.catalog-item wire:key="{{$item->id}}" id="{{$item->id}}"/>
                        @endforeach
                    @else
                        <div class="col-12">
                            <h3 class="text-center">Извините, в данной категории нет товаров</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
