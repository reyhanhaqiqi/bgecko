<nav class="navbar navbar-expand-lg navbar-dark sticky-top pt-3 pb-3">
    <div class=" container">
        <a class="navbar-brand" href="/">
            <img src="{{ url('assets/logo-icon.png') }}" alt="Logo Icon">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 ">
                <li class="nav-item active">
                    <a class="nav-link {{ Route::is('home') ? 'text-success' : 'text-light' }} me-5" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <a class="nav-link {{ Route::is('gecko') ? 'text-success' : 'text-light' }} me-5"
                    href="{{ route('gecko') }}">Gecko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('egg') ? 'text-success' : 'text-light' }} me-5"
                        href="{{ route('egg') }}">Data
                        Telur</a>
                </li>
                <li class="nav-item {{ Route::is('egg') ? 'text-success' : 'text-light' }}">
                    <a class="nav-link text-light" href="{{ route('animal-care') }}">Perawatan</a>
                </li>
            </ul>

            <div class="btn-call">
                <a href="https://wa.me/6289682174815">
                    <img src="{{ url('assets/phone-icon.png') }}" alt="Phone Icon">
                    Hubungi
                </a>
            </div>
        </div>
    </div>
</nav>