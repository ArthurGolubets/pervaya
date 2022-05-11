<footer class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="w-100 d-flex flex-column align-item-start h-100">
                    <a href="/">
                        <img src="/img/footer_logo.svg" alt="">
                    </a>
                    <a href="https://digitallab.com.ua" target="_blank" class="text-decoration-none mt-4 text-white" title="Создание сайтов - Digital Lab">
                        <img src="{{asset('img/digitallab.svg')}}" style="width: 150px;" alt="Создание сайтов - Digital Lab" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 mt-3 mt-md-0">
                <div class="footer-nav">
                    <h3 class="footer-nav__title">Контакты</h3>
                    <a href="https://yandex.ru/navi/-/CCUuV-B~cA" target="_blank" class="footer-nav__item">г. Москва, ст. метро Авиамоторная, ш. Энтузиастов, 12, корп. 2 Торговый центр «Город».</a>
                    <a href="tel:+7 (903) 518-40-80" class="footer-nav__item">+7 (903) 518-40-80</a>
                    <div class="footer-social">
                        <a href="https://www.instagram.com/pervaya.dvernaya/" target="_blank" class="footer-social__item">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="footer-social__item">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <!--<a href="#" class="footer-social__item">
                            <i class="fab fa-vk"></i>
                        </a>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-3 mt-md-0">
                <div class="footer-nav">
                    <h3 class="footer-nav__title">Товары</h3>
                    @foreach(\App\Models\Catalog::where('parent_id', null)->limit(5)->orderBy('priority')->get() as $item)
                        <a href="{{route('catalogItem', ['id' => $item->id, 'slug' => $item->slug])}}" class="footer-nav__item">{{$item->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 mt-3 mt-md-0">
                <div class="footer-nav">
                    <h3 class="footer-nav__title">Информация</h3>
                    <a href="{{route('about')}}" class="footer-nav__item">О компании</a>
                    <a href="{{route('gallery')}}" class="footer-nav__item">Галерея</a>
{{--                    <a href="" class="footer-nav__item">Примеры работ</a>--}}
                    <a href="{{route('catalog')}}" class="footer-nav__item">Двери в инвентаре</a>
                    <a href="{{route('service')}}" class="footer-nav__item">Сервисы</a>
                    <a href="{{route('contacts')}}" class="footer-nav__item">Контакты</a>
                </div>
            </div>
        </div>
        <div class="row mt-3 mt-md-0">
            <div class="col-12">
                <p class="mb-0">2021 «Первая дверная» / Все права защищены</p>
            </div>
        </div>
    </div>
</footer>
