<header>
    <section class="py-2 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 header-light d-flex align-items-center justify-content-between flex-md-row flex-column">
                        <div class="header-contacts">
                            <a href="tel:+7 (903) 518-40-80">+7 (903) 518-40-80</a>
                            <a href="https://yandex.ru/navi/-/CCUuV-B~cA" target="_blank">г. Москва</a>
                        </div>
                        <div class="d-md-flex d-none header-nav">
                            <ul class="w-100 ms-0 ps-0">
                                <li class="header-nav__item">
                                    <a href="{{route('about')}}" class="header-nav__link">О компании</a>
                                </li>
                                <li class="header-nav__item">
                                    <a href="{{route('gallery')}}" class="header-nav__link">Галерея</a>
                                </li>
                                <li class="header-nav__item">
                                    <a href="{{route('service')}}" class="header-nav__link">Сервисы</a>
                                </li>
                                <li class="header-nav__item">
                                    <a href="{{route('contacts')}}" class="header-nav__link">Контакты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section py-2 bg-black">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header w-100">
                        <a href="{{route('home')}}" class="header-brand">
                            <img src="{{asset('/img/logo.svg')}}" alt="">
                        </a>
                        <ul class="header-nav ms-0 ps-0 mb-0 d-lg-flex d-none">
                            @foreach(\App\Models\Catalog::where('parent_id', null)->limit(5)->orderBy('priority')->get() as $item)
                                <li class="header-nav__item">
                                    <a href="{{route('catalogItem', ['id' => $item->id, 'slug' => $item->slug])}}" class="header-nav__link">{{$item->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                        <div class="request-button d-lg-flex d-none">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-accent btn-request">Получить консультацию</a>
                        </div>
                        <button onclick="openNav()" id="toggleSidebar" class="d-block header__mobile-btn  d-lg-none">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="sidenav" id="mysidenav">
    <div class="w-100 pt-4 d-flex flex-column position-relative">
        <a href="javascript:closeNav()" class="position-absolute sidenav__close text-white"><i class="fas fa-times"></i></a>
        <div class="w-100 d-flex justify-content-center align-items-center">
            <a href="{{route('home')}}" class="header-brand">
                <img src="{{asset('/img/logo.svg')}}" alt="">
            </a>
        </div>
        <div class="flex-column px-2 mt-3 d-flex sidenav__nav">
            <a href="{{route('home')}}" class="sidenav__nav-link">Главная</a>
            <a href="{{route('catalog')}}" class="sidenav__nav-link">Каталог</a>
            <a href="{{route('about')}}" class="sidenav__nav-link">О компании</a>
            <a href="{{route('gallery')}}" class="sidenav__nav-link">Галерея</a>
            <a href="{{route('service')}}" class="sidenav__nav-link">Сервисы</a>
            <a href="{{route('contacts')}}" class="sidenav__nav-link">Контакты</a>
        </div>

        <div class="d-flex w-100 px-2 mt-3">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="sidenav__btns-modal btn-accent w-100 py-2 text-center text-decoration-none">Вызов замерщика</a>
        </div>

        <div class="mt-3 sidenav__socials d-flex justify-content-evenly">
            <a href="https://www.instagram.com/pervaya.dvernaya/" target="_blank" class="sidenav__socials-item">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="15" cy="15" r="14.5" stroke="#F5F5F5"/>
                    <path d="M18.6689 7H11.331C8.94287 7 7 8.94287 7 11.331V18.669C7 21.0571 8.94287 23 11.331 23H18.669C21.0571 23 23 21.0571 23 18.669V11.331C23 8.94287 21.0571 7 18.6689 7V7ZM15 19.3749C12.5876 19.3749 10.6251 17.4123 10.6251 15C10.6251 12.5876 12.5876 10.6251 15 10.6251C17.4123 10.6251 19.3749 12.5876 19.3749 15C19.3749 17.4123 17.4123 19.3749 15 19.3749ZM19.4795 11.6569C18.7666 11.6569 18.1867 11.077 18.1867 10.3641C18.1867 9.65124 18.7666 9.07129 19.4795 9.07129C20.1924 9.07129 20.7723 9.65124 20.7723 10.3641C20.7723 11.077 20.1924 11.6569 19.4795 11.6569Z" fill="#F5F5F5"/>
                    <path d="M14.9999 11.5631C13.1049 11.5631 11.563 13.1049 11.563 15C11.563 16.895 13.1049 18.4369 14.9999 18.4369C16.895 18.4369 18.4368 16.895 18.4368 15C18.4368 13.1049 16.895 11.5631 14.9999 11.5631Z" fill="#F5F5F5"/>
                    <path d="M19.4792 10.0094C19.2837 10.0094 19.1245 10.1686 19.1245 10.3641C19.1245 10.5597 19.2837 10.7189 19.4792 10.7189C19.6749 10.7189 19.8341 10.5598 19.8341 10.3641C19.8341 10.1685 19.6749 10.0094 19.4792 10.0094Z" fill="#F5F5F5"/>
                </svg>
            </a>

            <a href="" target="_blank" class="sidenav__socials-item">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="15" cy="15" r="14.5" stroke="#F5F5F5"/>
                    <g clip-path="url(#clip0_182_1298)">
                        <path d="M17.3304 9.81896H19.4302V6.16196C19.0679 6.11212 17.8221 6 16.3712 6C13.3438 6 11.2699 7.90421 11.2699 11.404V14.625H7.9292V18.7132H11.2699V29H15.3659V18.7142H18.5715L19.0804 14.626H15.3649V11.8094C15.3659 10.6278 15.684 9.81896 17.3304 9.81896Z" fill="#F5F5F5"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_182_1298">
                            <rect width="23" height="23" fill="white" transform="translate(2 6)"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>

            <a href="" target="_blank" class="sidenav__socials-item">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="15" cy="15" r="14.5" stroke="#F5F5F5"/>
                    <g clip-path="url(#clip0_182_1302)">
                        <path d="M21.5958 16.8566C21.2725 16.4483 21.365 16.2666 21.5958 15.9016C21.6 15.8975 24.2692 12.2091 24.5442 10.9583L24.5458 10.9575C24.6825 10.5016 24.5458 10.1666 23.885 10.1666H21.6983C21.1417 10.1666 20.885 10.4541 20.7475 10.7758C20.7475 10.7758 19.6342 13.4408 18.0592 15.1683C17.5508 15.6675 17.3158 15.8275 17.0383 15.8275C16.9017 15.8275 16.6892 15.6675 16.6892 15.2116V10.9575C16.6892 10.4108 16.5333 10.1666 16.0725 10.1666H12.6342C12.285 10.1666 12.0775 10.4216 12.0775 10.6591C12.0775 11.1775 12.865 11.2966 12.9467 12.755V15.9191C12.9467 16.6125 12.8208 16.74 12.5417 16.74C11.7983 16.74 9.99417 14.0641 8.925 11.0016C8.70917 10.4075 8.49833 10.1675 7.9375 10.1675H5.75C5.12583 10.1675 5 10.455 5 10.7766C5 11.345 5.74333 14.1708 8.45667 17.9041C10.265 20.4525 12.8117 21.8333 15.1283 21.8333C16.5208 21.8333 16.6908 21.5266 16.6908 20.9991C16.6908 18.5641 16.565 18.3341 17.2625 18.3341C17.5858 18.3341 18.1425 18.4941 19.4425 19.7233C20.9283 21.1808 21.1725 21.8333 22.0042 21.8333H24.1908C24.8142 21.8333 25.13 21.5266 24.9483 20.9216C24.5325 19.6491 21.7225 17.0316 21.5958 16.8566Z" fill="#F5F5F5"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_182_1302">
                            <rect width="20" height="20" fill="white" transform="translate(5 6)"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
        </div>
    </div>
</div>
