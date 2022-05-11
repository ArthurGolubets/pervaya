<div class="w-100">
    <a class="category__link @if($idActiveCategory == $catalog->id) active @endif text-decoration-none d-flex w-100 align-items-center justify-content-between" data-bs-toggle="collapse" href="#catalog_{{$catalog->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
        <span class=""  href="{{route('catalogItem', [ 'id' => $catalog->id, 'slug' => $catalog->slug ])}}">{{$catalog->name}}</span>
        <i class="far fa-chevron-down cur_point"></i>
    </a>

    <div class="collapse ps-2 pt-1 hover-tree" id="catalog_{{$catalog->id}}">
        @if($hasChild)
            @foreach($catalog->items()->orderBy('priority', 'asc')->get() as $item)
                @if($item->hasChildren())
                    <x-components.tree.parent-element :cat="$item" />
                @else
                    <x-components.tree.child-element :itm="$item"/>
                @endif
            @endforeach
        @endif
    </div>

    {{--<a class="category__link text-decoration-none d-flex w-100 align-items-center justify-content-between" data-bs-toggle="catalog_{{$catalog->id}}" href="#catalog_{{$catalog->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
        <span class=""  href="{{route('catalogItem', [ 'id' => $catalog->id, 'slug' => $catalog->slug ])}}">{{$catalog->name}}</span>
        <i data-bs-toggle="collapse"  class="far fa-chevron-down cur_point"></i>
    </a>


--}}{{--    <a data-bs-target="catalog_{{$catalog->id}}" href="#catalog_{{$catalog->id}}" id="button{{$catalog->id}}" class="">

    </a>--}}{{--
    <div class="collapse ps-2 pt-1 hover-tree" id="catalog_{{$catalog->id}}">
        @if($hasChild)
            @foreach($catalog->items()->orderBy('priority', 'asc')->get() as $item)
                @if($item->hasChildren())
                    <x-components.tree.parent-element :cat="$item" />
                @else
                    <x-components.tree.child-element :itm="$item"/>
                @endif
            @endforeach
        @endif
    </div>--}}
</div>
