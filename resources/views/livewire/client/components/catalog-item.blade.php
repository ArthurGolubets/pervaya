<div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-5 mt-5">
    <div class="card-item w-100 h-100 d-flex flex-column">
        <div class="card-item__image w-100 gallery_list">
            <a data-caption="{{$item->parent->name}} - {{$item->name}}" data-fancybox="gallery_{{$item->id}}"  href="{{asset($item->avatar)}}" class="d-block w-100 h-100">
                <img src="{{asset($item->avatar)}}" alt="" class="w-100 h-100 o-contain">
            </a>

            @foreach(\App\Models\Gallery::findByModelTypeAndModelId(\App\Models\CatalogItem::class, $item->id) as $img)
                <a data-caption="{{$item->parent->name}} - {{$item->name}}" href="{{asset('storage/app/public/gallery/'.$img->filename)}}" class="" data-fancybox="gallery_{{$item->id}}">
                    <img src="{{asset('storage/app/public/gallery/'.$img->filename)}}" class="d-none" alt="">
                </a>
            @endforeach
        </div>
        <div class="card-item__info mt-2">
            <span class="card-item__title">{{$item->name}}</span>
            <span class="card-item__art">{{$item->vendor_code}}</span>
        </div>

        <div class="w-100 px-2 text-center">
            <p class="text-center card-item__text">{{$item->description}}</p>
        </div>
    </div>
    <button class="btn btn-accent btn-request-white-bg w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Получить просчёт</button>
</div>

