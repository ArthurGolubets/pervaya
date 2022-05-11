<nav class="sidebar">
      <div class="sidebar-header px-2">
          <div class="row h-100 w-100 flex-nowrap m-0">
                <div class="col-10 sidebar-brand">
                    <div class="d-flex align-items-center h-100">
                         <a href="/" class="px-2">
                            <img src="{{asset('admin-resources/img/digital-logo.svg')}}" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
              <div class="col d-flex justify-content-center align-items-center">
                  <button class="sidebar-toggler button-unstyled" onclick="adminFunctions.toggleSidebar()">
                      <i class="far fa-bars"></i>
                  </button>
              </div>
          </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.home')}}">
                    <x-slot name="icon">
                        <i class="far fa-home-alt"></i>
                    </x-slot>
                    Статистика
                </x-components.admin.sidenav-link>
            </li>
            <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.pages.list')}}">
                    <x-slot name="icon">
                        <i class="fal fa-list"></i>
                    </x-slot>
                    Страницы
                </x-components.admin.sidenav-link>
            </li>

            <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.catalog.list')}}">
                    <x-slot name="icon">
                        <i class="fal fa-folders"></i>
                    </x-slot>
                    Каталог
                </x-components.admin.sidenav-link>
            </li>

                        <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.orders')}}">
                    <x-slot name="icon">
                        <i class="fal fa-sticky-note"></i>
                    </x-slot>
                    Заявки
                </x-components.admin.sidenav-link>
            </li>

            <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.messages')}}">
                    <x-slot name="icon">
                        <i class="fal fa-comments"></i>
                    </x-slot>
                    Обратная связь
                </x-components.admin.sidenav-link>
            </li>

            <li class="nav-item">
                <x-components.admin.sidenav-collapse title="Контент">
                    <x-slot name="titleIcon">
                        <i class="fal fa-file-invoice"></i>
                    </x-slot>
                    <x-components.admin.sidenav-link link="{{route('admin.vendors.list')}}">
                        <x-slot name="icon">
                            <i class="fal fa-industry-alt"></i>
                        </x-slot>
                        Производители
                    </x-components.admin.sidenav-link>
                    <x-components.admin.sidenav-link link="{{route('admin.slide.list')}}">
                        <x-slot name="icon">
                            <i class="fal fa-image"></i>
                        </x-slot>
                        Слайды
                    </x-components.admin.sidenav-link>
                    {{--<x-components.admin.sidenav-link link="">
                        <x-slot name="icon">
                            <i class="fal fa-photo-video"></i>
                        </x-slot>
                        Галереи
                    </x-components.admin.sidenav-link>--}}
                </x-components.admin.sidenav-collapse>
            </li>



            <hr>

            @if(env('USE_LANGUAGE'))
            <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.languages.list')}}">
                    <x-slot name="icon">
                        <i class="fal fa-language fs-4"></i>
                    </x-slot>
                    Языки
                </x-components.admin.sidenav-link>
            </li>
            @endif
            <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.settings')}}">
                    <x-slot name="icon">
                        <i class="fal fa-cog"></i>
                    </x-slot>
                    Настройки
                </x-components.admin.sidenav-link>
            </li>

            <li class="nav-item">
                <x-components.admin.sidenav-link link="{{route('admin.logout')}}">
                    <x-slot name="icon">
                        <i class="fal fa-sign-out-alt" style="transform: rotate(180deg)"></i>
                    </x-slot>
                    Выйти
                </x-components.admin.sidenav-link>
            </li>
        </ul>
      </div>
    </nav>
