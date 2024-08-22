@extends('partials.app')
<header>
    @include('partials.templates.menu-gob')
</header>
<nav id="logos">
    @include('partials.templates.logos-menu')
</nav>
<nav id="enlaces" class="navbar navbar-expand-lg bg-body-tertiary navbar-dark" style="background-color:#344474 !important">
    @include('partials.templates.nav-menu')
</nav>
<main>
    <div id="banner" class="align-items-center" style="background-image:url({{asset('pictures/line.png')}})">
        <div class="container-fluid">
            <div class="justify-content-around align-items-start">
                <div class="col-6">
                    <img src="{{asset('pictures/cle.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <img src="{{asset('pictures/banner-index.png')}}" alt="" class="img-fluid">
    </div>
    <section id="idiomas">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            @foreach ($idioma as $i)
                <div class="imagen-container" data-bs-toggle="modal" data-bs-target="#TextModal{{$i->id}}">
                    <img src="{{asset('pictures/index/idiomas/'.$i->imagen)}}" alt="" class="img-fluid">
                </div>
                @include('partials.modals._text')
            @endforeach
        </div>
    </section>
    <div class="container mt-3 mb-3">
        <h2 class="subtitle text-uppercase text-center mb-3 fw-bold">Cursos ofertados</h2>
        <div class="container">
            <ul class="nav nav-pills mb-3 d-flex justify-content-between" id="pills-tab" role="tablist">
                @foreach ($idiomaWithOutSpanish as $is)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $is->id == 2 ? 'active' : '' }}" id="tab-{{$is->id}}" data-bs-toggle="pill" data-bs-target="#tabx-{{$is->id}}" type="button" role="tab" aria-controls="tabx-{{$is->id}}" aria-selected="{{ $is->id == 2 ? 'true' : 'false' }}">
                            {{$is->nombre}}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach ($idiomaWithOutSpanish as $is )
                    <div class="tab-pane fade {{$is->id == 2 ? 'show active': ''}}" id="tabx-{{$is->id}}" role="tabpanel" aria-labelledby="tab-{{$is->id}}">
                        <h4 class="subtitle text-uppercase mt-3 mb-3">General</h4>
                        @php
                            $generalCourses = $cursos->where('id_idioma',$is->id)->where('categoria', 1)
                        @endphp
                        @if ($generalCourses->count() > 0)
                        <div class="container">
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                @foreach ($generalCourses as $course)
                                    <div class="card m-2 text-center p-2 card-course" style="width: 18rem; border: 2px solid #888">
                                        @if ($course->imagen)
                                            <img src="{{asset('pictures/index/cursos/'.$course->imagen)}}" class="card-img-top img-card" alt="">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title text-blue fw-bold">{{ $course->nombre }}</h5>
                                            @if($course->descripcion != "")
                                                <button class="btn btn-primary btn-course" data-bs-toggle="modal" data-bs-target="#InfoModal{{$course->id}}">Información</button>
                                            @endif
                                        </div>
                                    </div>
                                    @include('partials.modals._info')
                                @endforeach
                            </div>
                        </div>
                        @else
                            <p class="text-center fw-bold p-not">No hay cursos disponibles por el momento</p>
                        @endif

                        <h4 class="subtitle text-uppercase mt-5 mb-3">Cursos con fines Específicos</h4>
                        @php
                            $generalCourses = $cursos->where('id_idioma',$is->id)->where('categoria', 2)
                        @endphp
                        @if ($generalCourses->count() > 0)
                        <div class="container">
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                @foreach ($generalCourses as $course)
                                    <div class="card m-2 text-center p-2 card-course" style="width: 18rem; border: 2px solid #888">
                                        @if ($course->imagen)
                                            <img src="{{asset('pictures/index/cursos/'.$course->imagen)}}" class="card-img-top img-card" alt="">
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title text-blue fw-bold card-title-especific">{{ $course->nombre }}</h6>
                                            @if($course->descripcion != "")
                                                <button class="btn btn-primary btn-course" data-bs-toggle="modal" data-bs-target="#InfoModal{{$course->id}}">Información</button>
                                            @endif
                                        </div>
                                    </div>
                                    @include('partials.modals._info')
                                @endforeach
                            </div>
                        </div>
                        @else
                            <p class="text-center fw-bold p-not">No hay cursos disponibles por el momento</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <section id="certificates">
        <div class="container-fluid">
            <h2 class="text-center fw-bold pt-5 mb-3 subtitle">CERTIFICACIONES INTERNACIONALES</h2>
            <div class="swiper mySwiperT swiper1">
                <div class="swiper-wrapper">
                    @foreach ($certifications as $cert)
                        @if ($cert->logo != null)
                            <div class="swiper-slide swiper-slide1">
                                <img src="{{asset('pictures/services/certificacion/'.$cert->logo)}}" alt="">
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section id="events" class="mb-5">
        <div class="container">
            <h2 class="text-center fw-bold pt-5 mb-3 subtitle">EVENTOS</h2>
            <div class="accordion" id="accordionEvent">
                @foreach ($events as $e )
                    <div class="accordion-item mb-2 accordion-index">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$e->id}}" aria-controls="collapse{{$e->id}}">
                                {{$e->nombre}}
                            </button>
                        </h2>
                        <div id="collapse{{$e->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionEvent">
                            <div class="accordion-body">
                                @if($e->descripcion !=null)
                                    {!!$e->descripcion!!}
                                @else
                                    <p class="p-accordion">No hay información sobre este evento</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('partials.templates.contact')
    <footer class="footer-gob">
        @include('partials.templates.footer')
        <div class="img-footer"></div>
    </footer>
</main>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

