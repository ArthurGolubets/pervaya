<div>
    <section class="header">
        <div class="row w-100">
            <div class="col-12">
                <div class="route-back d-flex flex-wrap p-2 justify-content-between align-items-center">
                    <h5 class="ps-3 m-0">Каталог</h5>
                    <a href="{{route('admin.catalog.create')}}" class="btn btn-accent py-1 px-2">Создать <i class="far fa-plus ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row w-100 justify-content-between align-items-end my-2 px-2">
            <div class="col-12">
                @if($catalog->count() > 0)
                    <livewire:admin.components.tree.tree-inner :model-class="@get_class($catalog[0]?->getModel())" :elements="$catalog" />
                @else
                    <div class="w-100 text-center">
                        <span class="fw-bold fs-3">Каталоги еще не созданы или обновите страницу!</span>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            window.addEventListener('deletedItems', ()=>{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 2000,
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Удалено! Обновите страницу!'
                })
            })
        </script>
    @endpush
</div>


