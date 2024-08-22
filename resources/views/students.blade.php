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
        <img src="{{asset('pictures/banner-students.png')}}" alt="" class="img-fluid">
    </div>
    <section id="plataformas">
        <h2 class="subtitle text-uppercase text-center mb-3 fw-bold">Plataformas</h2>
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-around align-items-center">
                @foreach ($platforms as $p)
                <div class="card m-2 text-center p-2 card-course" style="width: 20rem; border: 2px solid #888">
                    @if ($p->imagen !=null)
                    <img src="{{asset('pictures/students/platforms/'.$p->imagen)}}" class="img-fluid" alt="">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-blue fw-bold">{{ $p->nombre }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            @if($p->descripcion != "")
                            <button class="btn btn-primary btn-course" data-bs-toggle="modal" data-bs-target="#PlatformModal{{$p->id}}">Información</button>
                        @endif
                        @if ($p->link != null)
                            <a class="btn btn-danger fw-bold" href="{{$p->link}}" target="_blank">Acceder</a>
                        @endif
                        </div>

                    </div>
                </div>
                @include('partials.modals._platform')
                @endforeach
            </div>
        </div>
    </section>
    <section id="services" class="mt-5 mb-5">
        <div class="container">
            <h2 class="subtitle text-uppercase text-center mb-3 fw-bold">SERVICIOS ESTUDIANTILES</h2>
            <div class="accordion" id="accordionService">
                @foreach ($students as $s )
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
    <section id="calendario">
        <h2 class="subtitle text-uppercase text-center mb-3 fw-bold">CALENDARIO</h2>
        <div class="container p-5">
            <div id="calendar"></div>
        </div>
    </section>
    @include('partials.templates.contact')
</main>
<footer class="footer-gob">
    @include('partials.templates.footer')
    <div class="img-footer"></div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.0.1/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                @foreach($calendario as $event)
                {
                    title: '{{ $event->title }}',
                    start: '{{ $event->start }}',
                    end: '{{ $event->end }}',
                    color: '{{ $event->color }}',
                },
                @endforeach
            ]
        });

        calendar.render();
    });
</script>
