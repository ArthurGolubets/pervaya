<x-layouts.client.app>
    <div class="w-100">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="w-100 d-flex flex-wrap breadcrumb" >
                        <a href="{{route('home')}}" class="breadcrumb-item">Главная</a>
                        <a href="#" class="breadcrumb-item">Контакты</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="w-100 d-flex align-items-end">
                        <h3 class="section-title">Контакты</h3>
                        <div class="section-line"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-12">
                    <div class="w-100 h-100">
                        <div class="contacts-socials h-100 justify-content-evenly d-flex flex-column align-items-start">
                            <div class="contacts-socials__item">
                                <a href="tel:+7 (903) 518-40-80" class="contacts-socials__icon">
                                    <i class="fas fa-phone fa-rotate-90"></i>
                                </a>
                                <div class="contacts-socials__info">
                                    <a href="tel:+7 (903) 518-40-80">+7 (903) 518-40-80</a>
                                    <span>Прием звонков 8:00-21:00</span>
                                </div>
                            </div>
                            <div class="contacts-socials__item mt-3">
                                <div class="contacts-socials__icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="contacts-socials__info">
                                    <span>Время работы</span>
                                    <span>8:00-21:00</span>
                                </div>
                            </div>
                            <div class="contacts-socials__item d-flex mt-3">
                                <a href="https://yandex.ru/maps/-/CCUyA6rUwA" target="_blank" class="contacts-socials__icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <div class="contacts-socials__info">
                                    <a href="https://yandex.ru/maps/-/CCUyA6rUwA" target="_blank">г. Москва,<br> ст. метро Авиамоторная, <br>ш. Энтузиастов, 12, корп. 2<br> Торговый центр «Город».</a>
                                </div>
                            </div>

                            <div class="contacts-socials__item mt-3">
                                <a href="mailto:pervaya.dvernaya@mail.com" target="_blank" class="contacts-socials__icon">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <div class="contacts-socials__info">
                                    <a href="mailto:pervaya.dvernaya@mail.com" target="_blank">pervaya.dvernaya@mail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-lg-0 mt-5">
                    <div class="w-100">
                        <div action="#" class="h-100 contacts-form-contact">
                            <div class="row">
                                <div class="col-12"> <h3>Обратная связь</h3> </div>
                                <livewire:client.components.question-form/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="w-100">
                        <iframe style="height: 400px;" src="https://yandex.ru/map-widget/v1/-/CCUuV-Fj0B" frameborder="0" allowfullscreen="" class=" w-100"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.client.app>
