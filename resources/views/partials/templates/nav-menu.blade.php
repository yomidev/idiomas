<div class="container-fluid justify-content-end text-uppercase">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 ms-auto mb-lg-0">
            <li class="nav-item {{ Request::is('/') ? 'active2' : '' }}"><a href="{{route('index')}}" class="nav-link text-white hover-link">Inicio</a></li>
            <li class="nav-item {{ Request::is('about') ? 'active2' : '' }}">
                <a href="{{route('about')}}" class="nav-link text-white hover-link"  id="">Conócenos</a>
            </li>
            <li class="nav-item {{ Request::is('services') ? 'active2' : '' }}"><a href="{{route('services')}}" class="nav-link text-white hover-link">Servicios</a></li>
            <li class="nav-item {{ Request::is('students') ? 'active2' : '' }}"><a href="{{route('students')}}" class="nav-link text-white hover-link">Estudiante</a></li>
        </ul>
    </div>
</div>
