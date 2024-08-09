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
    

    <footer class="footer-gob">
        @include('partials.templates.footer')
        <div class="img-footer"></div>
    </footer>
</main>
</body>
</html>

