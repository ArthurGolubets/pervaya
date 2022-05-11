<div>
    <section class="header px-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="w-100 d-flex justify-content-center">
                    <h1>Статистика</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="content px-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="w-100 h-100 dash__card-inner">
                    <div class="row">
                        <div class="col-4">
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="fal fa-clipboard-list fs-2"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="w-100 d-flex flex-column">
                                <span class="fw-bold w-100 text-center">Заявок</span>
                                <span class="result-cartd w-100 text-center">{{$OrdersAll}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="w-100 h-100 dash__card-inner">
                    <div class="row">
                        <div class="col-4">
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="fal fa-clipboard-list fs-2"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="w-100 d-flex flex-column">
                                <span class="fw-bold w-100 text-center">Заявок за месяц</span>
                                <span class="result-cartd w-100 text-center">{{$orderPerMonth}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="w-100 h-100 dash__card-inner">
                    <div class="row">
                        <div class="col-4">
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="fal fa-clipboard-list fs-2"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="w-100 d-flex flex-column">
                                <span class="fw-bold  w-100 text-center">Заявок за неделю</span>
                                <span class="result-cartd w-100 text-center ">{{$orderPerWeek}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
