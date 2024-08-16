<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
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
                    <a class="nav-link {{ ($title == 'BGecko - Sistem Informasi Leopard Gecko') ? 'text-success' : 'text-light' }} me-5"
                        aria-current="page" href="/">Home</a>
                </li>
                <a class="nav-link {{ ($title == 'Data Leopard Gecko') ? 'text-success' : 'text-light' }} me-5"
                    href="gecko">Gecko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light me-5" href="#">Data Telur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Perawatan</a>
                </li>
            </ul>

            <div class="btn-call">
                <a href="">
                    <img src="{{ url('assets/phone-icon.png') }}" alt="Phone Icon">
                    Hubungi
                </a>
            </div>
        </div>
    </div>
</nav>