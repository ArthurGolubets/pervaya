<div>
    <section class="header">
        <div class="row w-100">
            <div class="col-12">
                <div class="route-back d-flex flex-wrap p-2 justify-content-between align-items-center">
                    <h5 class="ps-3 m-0">Страницы</h5>
                    <a href="{{route('admin.vendors.create')}}" class="btn btn-accent py-1 px-2">Добавить <i class="far fa-plus ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row w-100 justify-content-between align-items-end my-2 px-2">
            <div class="table-responsive px-2 w-100">
                <table class="table-collapse styled-table w-100 fs-7">
                    <thead>
                    <tr class="noselect">
                        <td class="text-md-center">№</td>
                        <td class="text-md-center">Название</td>
                        <td class="text-md-center">Кол-во продукций</td>
                        <td class="text-md-center"></td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($vendor_list as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->vendor_name}}</td>
                                <td>{{$item->getItemsCount()}}</td>
                                <td width="150">
                                    <a href="{{route('admin.vendors.edit', ['id' => $item->id])}}"><i class="fal fa-edit fs-6"></i></a>
                                    <a href="javascript:deleteItems({{$item->id}})" class="ms-2"><i class="fal fa-trash-alt fs-6"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@push('adminFunctionsExtension')
    <script>
        function deleteItems(id){
            Swal.fire({
                title: "Внимание",
                text: "Вы уверены что хотите удалить запись? Данное действие невозможно отменить",
                icon: "info",
                buttons: true,
                confirmButtonText: "Удалить",
                dangerMode: true
            }).then(willDelete => {
                if(willDelete) {
                    @this.deleteItems(id);
                }
            });
        }
    </script>
@endpush
