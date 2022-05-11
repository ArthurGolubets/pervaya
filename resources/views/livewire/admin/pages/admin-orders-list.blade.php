<div>
    <section class="header">
        <div class="row w-100">
            <div class="col-12">
                <div class="route-back d-flex flex-wrap p-2 justify-content-between align-items-center">
                    <h5 class="ps-3 m-0">Заявки</h5>
{{--                    <a href="#" data-bs-target="#createLanguage" data-bs-toggle="modal" class="btn btn-accent py-1 px-2">Добавить <i class="far fa-plus ms-2"></i></a>--}}
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
                            <td class="text-md-center">#</td>
                            <td class="text-md-center">Имя</td>
                            <td class="text-md-center">Телефон</td>
                            <td class="text-md-center">Дата</td>
                            <td class="text-md-center"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ordersList as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->phone}}</td>
                                <td class="w-fit-content">{{$order->created_at->format('d.m.Y | H:i')}}</td>
                                <td width="100">
                                    <a href="#" wire:click.prevent="showModalOrder({{$order->id}})"><i class="fal fa-eye"></i></a>
                                    <a href="javascript:deleteItem({{$order->id}})" class="ms-2"><i class="fal fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="row w-100">
            <div class="col-12">
                <div class="w-100 d-flex justify-content-end align-items-center">
                    {{$ordersList->links()}}
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="ordersModal" wire:ignore.self tabindex="-1" aria-labelledby="createLanguage" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content modal__bg">
                <div class="w-100 d-flex flex-column py-3 px-2">
                    <h3 class="w-100 fs-5 fw-bolder text-center">Заявка №{{$modal->id}}</h3>
                    <div class="admin__modal-inner d-flex align-items-center">
                        <span class="fs-6 text-gray pe-2">Имя:</span>
                        <span class="fw-bolder fs-6 ml-2">{{$modal->name}}</span>
                    </div>

                    <div class="admin__modal-inner mt-2 d-flex align-items-center">
                        <span class="fs-6 text-gray pe-2">Телефон:</span>
                        <span class="fw-bolder fs-6 ml-2">{{$modal->phone}}</span>
                    </div>

                    <div class="admin__modal-inner mt-2 d-flex align-items-center">
                        <span class="fs-6 text-gray d-block pe-2">Комментарий: <i>{{$modal->comment}}</i></span>
                    </div>
                </div>

                <div class="w-100 d-flex justify-content-center align-items-center my-2">
                    <button class="btn btn-accent" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>
        function deleteItem(id){
            Swal.fire({
                title: 'Удалить заявку?',
                text: 'Внимание! Данное действие невозможно отменить!',
                showCancelButton: true,
                confirmButtonText: 'Удалить',
                cancelButtonText: `Отмена`,
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteItem(id);
                }
            })
        }
    </script>

    <script>
        let myModalS = new bootstrap.Modal(document.querySelector('#ordersModal'))

        window.addEventListener('showModalorder', () => {
            myModalS.show()
        })
    </script>
@endpush
