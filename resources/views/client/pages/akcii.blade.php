<x-layouts.client.app>
    <div class="container">

            <div class="row mt-4">
                <div class="col-12">
                    <div class="w-100 d-flex flex-wrap breadcrumb" >
                        <a href="{{route('home')}}" class="breadcrumb-item">Главная</a>
                        <a href="#" class="breadcrumb-item">{{$title}}</a>
                    </div>
                </div>
            </div>


        <div class="row mt-2">
            <div class="col-12">
                <div class="w-100 d-flex align-items-end">
                    <h3 class="section-title">{{$title}}</h3>
                    <div class="section-line"></div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            @foreach($items as $item)
                <livewire:client.components.catalog-item id="{{$item->id}}"/>
            @endforeach
        </div>
    </div>
</x-layouts.client.app>
