<div class="tree-item p-0 ps-2" id="" wire:sortable.item="{{$item->id}}" wire:key="item-{{ $item->id }}">
    <div class="item-inner">
        <div class="item__left">
            <a wire:click.prevent="toggleChildren" class="tree-item__title text-black text-decoration-none me-2"> <i @class(['fal', 'fa-folder' => $isCatalog, 'fa-file-alt' => !$isCatalog])></i>  {{$item->name}}</a>
            @if($hasChildren || $hasItemsChildren)
                <div wire:click="toggleChildren" class="item-toggle">
                    <i style="cursor: pointer"
                        @class([
                    'fal',
                    'fa-plus' => !$showChildren,
                    'fa-minus' => $showChildren,
                    ])></i>
                </div>
            @endif
        </div>
        <div class="item__right">
            <div class="d-flex align-items-center">
                @if($createLink)
                    <a href="{{$createLink}}" class="ms-lg-0 me-lg-2 m-2 color-black text-decoration-none button-unstyled me-3">
                        <i class="fal fa-folder-plus fs-4"></i>
                    </a>
                @endif
                    @if($itemCreateLink)
                        <a href="{{$itemCreateLink}}"  class="ms-lg-0 me-lg-2 mx-2 color-black text-decoration-none button-unstyled">
                            <i class="fal fa-file-plus fs-4"></i>
                        </a>
                    @endif
                @if($editLink)
                    <a href="{{$editLink}}" class="ms-lg-0 me-lg-2 mx-2 color-black text-decoration-none button-unstyled">
                        <i class="fal fa-edit fs-4"></i>
                    </a>
                @endif

                <a href="#" onclick='adminFunctions.deleteItem({{$item->id,}}, "{{preg_quote(get_class($item->getModel()), '/')}}")' class="ms-lg-0 me-lg-2 mx-2 color-black text-decoration-none button-unstyled">
                    <i class="fal fa-trash fs-4"></i>
                </a>

                <div wire:sortable.handle style="cursor: move" class=" ms-2 item__right my-handle">
                    <i class="fas fa-bars fs-3"></i>
                </div>
            </div>
        </div>
    </div>
    @if($showChildren)
        @if($hasChildren)
            <div class="tree-inner">
                <livewire:admin.components.tree.tree-inner :model-class="get_class($children[0]->getModel())" :item-key="$item->id" :elements="$children" />
            </div>
        @endif
    @endif

    @if($showItemsChildren)
        @if($hasItemsChildren)
            <div class="tree-inner">
                <livewire:admin.components.tree.tree-inner :model-class="get_class($childrenItem[0]->getModel())" :item-key="$item->id" :elements="$childrenItem" />
            </div>
        @endif
    @endif
</div>


@push('adminFunctionsExtension')
    <script>
        (()=>{
            adminFunctions.deleteItem = async (item, modelName)=>{
                let result = await Swal.fire({
                    title: 'Внимание',
                    text: "Вы уверены что хотите удалить запись? Данное действие невозможно отменить",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Удалить',
                    cancelButtonText: 'Отменить'
                })
                if(result.isConfirmed)
                    @this.deleteItem(item, modelName);
            };
        })();
    </script>
@endpush
