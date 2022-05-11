<div class="row">
    <div  @class(['col-lg-6  mt-3', 'order-1' => $typesPosition == 'right'])>
        <div class="w-100 h-100 position-relative order">
            @if($items->first())
                <a href="{{asset('storage/gallery/'.$items[0]->filename)}}" data-fancybox="gallery" class="w-100 news-item_main ">
                    <img src="{{asset('storage/gallery/'.$items[0]->filename)}}" class="w-100 o-contain news-item_main-img" alt="">
                </a>
            @endif
        </div>
    </div>
    <div  @class(['col-lg-6 mt-3', 'order-0' => $typesPosition == 'right'])>
        <div class="h-100 align-items-center row">
            @foreach($items->skip(1) as $itm)
                <div class="col-lg-6 col-12 mt-3">
                    <a href="{{asset('storage/gallery/'.$itm->filename)}}" data-fancybox="gallery" class="position-relative w-100 small-news-item">
                        <img src="{{asset('storage/gallery/'.$itm->filename)}}" class="o-contain  w-100" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
