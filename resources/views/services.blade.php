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
        <img src="{{asset('pictures/banner-services.png')}}" alt="" class="img-fluid">
    </div>
    <section id="certificacion">
        <h2 class="subtitle text-uppercase text-center mb-3 fw-bold">Certificaciones Internacionales</h2>
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                @foreach ($certifications as $c)
                <div class="card m-2 text-center p-2 card-course" style="width: 18rem; border: 2px solid #888">
                    @if ($c->logo !=null)
                    <img src="{{asset('pictures/services/certificacion/'.$c->logo)}}" class="img-fluid" alt="" style="max-width: 150px !important;margin:0 auto;">
                    <div class="card-body">
                        <h6 class="card-title text-blue fw-bold">{{ $c->nombre }}</h6>
                        @if($c->descripcion != "")
                            <button class="btn btn-primary btn-course" data-bs-toggle="modal" data-bs-target="#CertModal{{$c->id}}">Información</button>
                        @endif
                    </div>
                    @endif
                </div>
                @include('partials.modals._cert')
                @endforeach
            </div>
        </div>
    </section>
    <section id="services" class="mt-5">
        <div class="container">
            <h2 class="subtitle text-uppercase text-center mb-3 fw-bold">SERVICIOS</h2>
            <div class="accordion" id="accordionService">
                @foreach ($services as $s )
                    <div class="accordion-item mb-2 accordion-index">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$s->id}}" aria-controls="collapse{{$s->id}}">
                                {{$s->nombre}}
                            </button>
                        </h2>
                        <div id="collapse{{$s->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionService">
                            <div class="accordion-body">
                                @if($s->descripcion !=null)
                                    {!!$s->descripcion!!}
                                @else
                                    <p class="p-accordion">No hay información sobre este servicio. Favor de contactar a la coordinación 9105002 ext. 190</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
</main>
<footer class="footer-gob">
    @include('partials.templates.footer')
    <div class="img-footer"></div>
</footer>
