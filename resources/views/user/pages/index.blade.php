<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- styling css --}}
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    @extends('layouts.app')

    @section('title', 'BGecko - Sistem Informasi Leopard Gecko')

    @section('content')
    {{-- navbar section --}}
    @include('user.components.navbar')

    {{-- hero section --}}
    <div class="container hero-section">
        <div class="row align-items-center">
            <div class="hero-title col-md-6">
                <h1 class="title">
                    <section>BGecko</section>, Sistem Informasi Leopard Gecko
                </h1>
                <p class="description">Dimana anda bisa mencari informasi mengenai hewan hias Leopard Gecko</p>
                <div class="button">
                    <a href="">Data Gecko</a>
                </div>
            </div>

            <div class="hero-image col-md-6 d-flex justify-content-end">
                <img src="{{ url('assets/hero-image.png') }}" alt="Hero Image">
            </div>
        </div>
    </div>

    {{-- category section --}}
    <div class="container category-section">
        <div class="row justify-content-center">
            <h4 class="text-center">DAFTAR KATEGORI</h4>
            <h1 class="text-center mt-4">Kategori Gecko</h1>

            <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
                <div class="category-box pt-5">
                    <img src="{{ url('assets/category-image1.png') }}" alt="Category Image1">
                    <h3>Raptor</h3>
                    <p>(13 Ekor)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
                <div class="category-box pt-5">
                    <img src="{{ url('assets/category-image2.png') }}" alt="Category Image2">
                    <h3>Sunglow</h3>
                    <p>(15 Ekor)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
                <div class="category-box pt-5">
                    <img src="{{ url('assets/category-image3.png') }}" alt="Category Image3">
                    <h3>SHTCT</h3>
                    <p>(15 Ekor)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
                <div class="category-box pt-5">
                    <img src="{{ url('assets/category-image4.png') }}" alt="Category Image4">
                    <h3>Jungle</h3>
                    <p>(10 Ekor)</p>
                </div>
            </div>
        </div>
    </div>

    {{-- information section--}}
    <div class="container information-section">
        <div class="row justify-content-center">
            <h4>TELUR GECKO</h4>
            <h1 class="mt-4">Beberapa Informasi <br><span>Data Telur</span></h1>

            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <div class="information-box pt-5">
                    <div class="egg-icon">
                        <img class="d-block mx-auto mt-3" src="{{ url('assets/egg-icon.png') }}" alt="Egg Icon">
                    </div>
                    <img class="d-block mx-auto" src="{{ url('assets/egg-information-image1.png') }}" alt="Egg Image1">
                    <h3>Telur SHTCT</h3>
                    <p>Telur ini merupakan........</p>
                    <p class="yellow-text">SHTCT x Hybino</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <div class="information-box pt-5">
                    <div class="egg-icon">
                        <img class="d-block mx-auto mt-3" src="{{ url('assets/egg-icon.png') }}" alt="Egg Icon">
                    </div>
                    <img class="d-block mx-auto" src="{{ url('assets/egg-information-image2.png') }}" alt="Egg Image2">
                    <h3>Telur Raptor</h3>
                    <p>Telur ini merupakan........</p>
                    <p class="yellow-text">MS BS PH Raptor x MSE BS</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <div class="information-box pt-5">
                    <div class="egg-icon">
                        <img class="d-block mx-auto mt-3" src="{{ url('assets/egg-icon.png') }}" alt="Egg Icon">
                    </div>
                    <img class="d-block mx-auto" src="{{ url('assets/egg-information-image3.png') }}" alt="Egg Image3">
                    <h3>Telur Sunglow</h3>
                    <p>Telur ini merupakan........</p>
                    <p class="yellow-text">SG x SG</p>
                </div>
            </div>
        </div>
    </div>

    {{-- description section --}}
    <div class="container description-section">
        <div class="row">
            <div class="description-image col-lg-6 col-md-12 d-flex justify-content-center">
                <img src="{{ url('assets/description-image.png') }}" alt="Description Image">
            </div>

            <div class="description-text col-lg-6 col-md-12">
                <h4>TENTANG GECKO</h4>
                <h1 class="mt-4">Apa itu hewan hias<br><span>Leopard Gecko?</span></h1>
                <p>“Tokek Leopard adalah jenis tokek yang terdapat di Pakistan, India dan Iran. Tokek ini adalah
                    binatang hias dan menjadi hewan peliharaan populer karena warna tubuhnya yang indah dan perawatannya
                    yang mudah.”</p>
                <img src="{{ url('assets/description-detail-image.png') }}" alt="Description Detail Image">
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('user.components.footer')
    @endsection
</body>

</html>