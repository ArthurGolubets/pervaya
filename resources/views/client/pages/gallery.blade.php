<x-layouts.client.app >

    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <div class="w-100 d-flex flex-wrap breadcrumb" >
                    <a href="{{route('home')}}" class="breadcrumb-item">Главная</a>
                    <a href="#" class="breadcrumb-item">Галерея</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="w-100 d-flex align-items-end">
                    <h3 class="section-title">{{$page->title}}</h3>
                    <div class="section-line"></div>
                </div>
            </div>
        </div>
        <div class="row mt-3 align-items-center justify-content-center">
            @if($page->gallery()->count() > 0)
                <div class="col-12">
                    @php
                        $iteration = 1;
                    @endphp
                    @for($i=0;$i<($page->gallery()->count() / 5);$i++)
                        <livewire:client.pages.gallery-list :items="$page->gallery()->slice($i*$iteration,5)" :types-position="(($iteration % 2) ? 'left' : 'right')" />
                        @php
                            $iteration++;
                        @endphp
                    @endfor
                </div>
            @else
                <div class="col-12">
                    <div class="w-100 d-flex justify-content-center mt-3">
                        <h4>Извините, здесь пока ничего нет!</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.client.app>
