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
    <div class="m-5">
        Holi
    </div>
    <footer class="footer-gob">
        @include('partials.templates.footer')
        <div class="img-footer"></div>
    </footer>
</main>
</body>
</html>

