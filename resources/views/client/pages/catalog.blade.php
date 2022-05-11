<x-layouts.client.app>
    <div class="w-100">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="w-100 d-flex flex-wrap breadcrumb" >
                        <a href="{{route('home')}}" class="breadcrumb-item">Главная</a>
                        <a href="#" class="breadcrumb-item">Каталог</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="w-100 d-flex align-items-end">
                        <h3 class="section-title">Каталог</h3>
                        <div class="section-line"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                @foreach($category as $item)
                    <x-client.category  link="{{route('catalogItem', ['id' => $item->id, 'slug' => $item->slug])}}" img="{{asset($item->avatar)}}"  title="{{$item->name}}"/>
                @endforeach
            </div>

            @if($popular->count() > 0)
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="w-100 d-flex align-items-end">
                            <h3 class="section-title">Популярное</h3>
                            <div class="section-line d-flex align-items-end justify-content-end">
                                <a href="#" class="section-link btn btn-text-accent">Смотреть еще</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach($popular as $item)
                        <livewire:client.components.catalog-item id="{{$item->id}}"/>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layouts.client.app>
