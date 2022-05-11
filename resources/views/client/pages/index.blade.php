<x-layouts.client.app>
    <section id="slider" class="position-relative mb-5">
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach(\App\Models\Slider::all() as $slide)
                        <li class="splide__slide">
                            <a @if($slide->link) href="{{$slide->link}}" @endif class="w-100 h-100"><img src="{{asset($slide->avatar)}}" alt="" class="h-100 w-100 o-contain"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="splide-custom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="splide-custom__navigation custom-preview">
                            <i class="fal fa-long-arrow-left"></i>
                        </a>
                        <a href="#" class="splide-custom__navigation custom-next">
                            <i class="fal fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="catalog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 d-flex align-items-end">
                        <h3 class="section-title">Каталог</h3>
                        <div class="section-line"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="mt-3 container">
            <div class="row">
                @foreach($category as $item)
                    <x-client.category  link="{{route('catalogItem', ['id' => $item->id, 'slug' => $item->slug])}}" img="{{asset($item->avatar)}}"  title="{{$item->name}}"/>
                @endforeach
            </div>
            <div class="row mt-3 align-items-center justify-content-center">
                <a href="{{route('catalog')}}" class="btn px-4 btn-outline-black w-fit-content">Еще</a>
            </div>
        </div>
    </section>

    @if($popular->count() > 0)
        <section class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="w-100 d-flex align-items-end">
                            <h3 class="section-title">Популярное</h3>
                            <div class="section-line d-flex align-items-end justify-content-end">
                                <a href="{{route('popular')}}" class="section-link btn btn-text-accent">Смотреть еще</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach($popular as $item)
                        <livewire:client.components.catalog-item id="{{$item->id}}"/>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($newItem->count() > 0)
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="w-100 d-flex align-items-end">
                            <h3 class="section-title">Новинки</h3>
                            <div class="section-line d-flex align-items-end justify-content-end">
                                <a href="{{route('new')}}" class="section-link btn btn-text-accent">Смотреть еще</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach($newItem as $item)
                        <livewire:client.components.catalog-item id="{{$item->id}}"/>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 d-flex align-items-end">
                        <h3 class="section-title">О нас</h3>
                        <div class="section-line"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <img src="/img/about.png" alt="" class="w-100 o-contain">
                </div>
                <div class="col-lg-6">
                    <div class="info">
                        <p>Наша компания появилась в 2001 году. Из небольшого павильона мы превратились в крупнейшего дилера Москвы и Московской области всего за 20 лет успешной работы. И этому способствовал наш  девиз:</p>
                        <h4 style="color: var(--accent-color)">«Честность. Качество. И совершенство»</h4>
                    </div>
                    <a href="{{route('about')}}" class="mt-4 px-4 btn btn-outline-black">Подробнее</a>
                </div>
            </div>
        </div>
    </section>


    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 d-flex align-items-end">
                        <h3 class="section-title">Контакты</h3>
                        <div class="section-line"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="contacts-socials d-flex align-items-start flex-column align-items-lg-center w-100 flex-lg-row">
                        <div class="contacts-socials__item ">
                            <a href="tel:+7 (903) 518-40-80" class="contacts-socials__icon">
                                <i class="fas fa-phone fa-rotate-90"></i>
                            </a>
                            <div class="contacts-socials__info">
                                <a href="+7 (903) 518-40-80">+7 (903) 518-40-80</a>
                                <span>Прием звонков 8:00-21:00</span>
                            </div>
                        </div>
                        <div class="contacts-socials__item  mt-3">
                            <div class="contacts-socials__icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="contacts-socials__info">
                                <span>Время работы</span>
                                <span>8:00-21:00</span>
                            </div>
                        </div>
                        <div class="contacts-socials__item d-flex mt-3">
                            <a href="https://yandex.ru/navi/-/CCUuV-B~cA" target="_blank" class="contacts-socials__icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                            <div class="contacts-socials__info">
                                <span>Россия</span>
                                <a href="https://yandex.ru/navi/-/CCUuV-B~cA" target="_blank">г. Москва, <br>ст. метро Авиамоторная,<br> ш. Энтузиастов, 12, корп. 2<br> Торговый центр «Город».</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 g-0">
                <div class="col-lg-6">
                    <div class="ratio ratio-4x3 h-100">
                        <iframe src="https://yandex.ru/map-widget/v1/-/CCUuV-Fj0B" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div action="#" class="h-100 contacts-form">
                        <div class="row">
                            <div class="col-12"> <h3>Обратная связь</h3> </div>
                            <livewire:client.components.question-form/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('style')
        <link rel="stylesheet" href="{{asset('shared/assets/splide-3.2.1/dist/css/splide.css')}}">
    @endpush

    @push('scripts')
        <script src="{{asset('shared/assets/splide-3.2.1/dist/js/splide.min.js')}}"></script>

        <script>
            let mainSplideElement = document.querySelector('#slider'),
                mainSplide = new Splide( mainSplideElement.querySelector('.splide'), {
                    type:"loop",
                    autoplay: true,
                    arrows: false,
                    rewind: true,
                    interval: 2500,
                } ).mount(),
                mainSplideNext = mainSplideElement.querySelector('.custom-next'),
                mainSplidePrev = mainSplideElement.querySelector('.custom-preview');

            mainSplideNext.addEventListener('click', e => {
                e.preventDefault();
                mainSplide.go('+1');
            })

            mainSplidePrev.addEventListener('click', e => {
                e.preventDefault();
                mainSplide.go('-1');
            })
        </script>
    @endpush

</x-layouts.client.app>


