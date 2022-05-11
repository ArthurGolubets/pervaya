<x-layouts.client.app>
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
                            <x-components.tree.parent-element :cat="$cat" />
                        @else
                            <x-components.tree.child-element :itm="$cat"/>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-12 d-block d-md-none">
                <hr>
            </div>
            <div class="col-lg-9 mt-3 mt-md-0 col-12">
                    <div class="row">
                        @foreach(\App\Models\Vendor::all() as $itm)
                            <div class="col-lg-3 mb-2">
                                <div class="w-100 catalog__items d-flex justify-content-center">
                                    <a href="" class="catalog__items-link p-2">{{$itm->vendor_name}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                <div class="row mt-4">
                    @if($catalog->getAllItemsList()->count())
                        @foreach($catalog->getAllItemsList() as $item)
                            <livewire:client.components.catalog-item id="{{$item->id}}"/>
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

</x-layouts.client.app>
