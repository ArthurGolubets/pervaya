<div class="w-100 mb-1">

    <a class="category__link @if($isActiveCategory == $item->id) active @endif text-decoration-none" href="{{route('catalogItem', [ 'id' => $item->id, 'slug' => $item->slug ])}}">{{$item->name}}</a>
</div>
