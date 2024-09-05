@extends('layouts.app')

@section('title', 'BGecko - Sistem Informasi Leopard Gecko')

@section('content')

{{-- hero section --}}
<div class="container hero-section">
    <div class="row align-items-center">
        <div class="hero-title col-md-6">
            <h1 class="title">
                <section>BGecko</section>, Sistem Informasi Leopard Gecko
            </h1>
            <p class="description">Dimana anda bisa mencari informasi mengenai hewan hias Leopard Gecko</p>
            <div class="button">
                <a href="{{ route('gecko') }}">Data Gecko</a>
            </div>
        </div>

        <div class="hero-image col-md-6 d-flex justify-content-end">
            <img src="{{ asset('web/images/hero-image.png') }}" alt="Hero Image">
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
                <img src="{{ asset('web/images/category-image1.png') }}" alt="Category Image1">
                <h3>Raptor</h3>
                <p>+10 Ekor</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/category-image2.png') }}" alt="Category Image2">
                <h3>Sunglow</h3>
                <p>+10 Ekor</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/category-image3.png') }}" alt="Category Image3">
                <h3>SHTCT</h3>
                <p>+10 Ekor</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/category-image4.png') }}" alt="Category Image4">
                <h3>Jungle</h3>
                <p>+10 Ekor</p>
            </div>
        </div>
    </div>
</div>

{{-- information section--}}
<div class="container information-section">
    <div class="row justify-content-center">
        <h4>TELUR GECKO</h4>
        <h1 class="mt-4">Beberapa Informasi <br><span>Data Telur</span></h1>

        @foreach ($eggs as $egg)
        <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
            <div class="information-box pt-5">
                <div class="egg-icon">
                    <img class="d-block mx-auto mt-3" src="{{ asset('web/images/egg-icon.png') }}" alt="Egg Icon">
                </div>
                <img class="d-block mx-auto gallery" src="{{ Storage::url('eggs/' . $egg->galleryEggs->url) }}"
                    alt="Egg Image">
                <h3 class="text-capitalize">{{ \Carbon\Carbon::parse($egg->tanggal_inkubasi)->translatedFormat('d M Y')
                    }}</h3>
                <p class="text-capitalize">{{ $egg->keterangan }}</p>
                <p class="yellow-text">{{ $egg->perkawinan }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- description section --}}
<div class="container description-section">
    <div class="row">
        <div class="description-image col-lg-6 col-md-12 d-flex justify-content-center">
            <img src="{{ asset('web/images/description-image.png') }}" alt="Description Image">
        </div>

        <div class="description-text col-lg-6 col-md-12">
            <h4>TENTANG GECKO</h4>
            <h1 class="mt-4">Apa itu hewan hias<br><span>Leopard Gecko?</span></h1>
            <p>“Tokek Leopard adalah jenis tokek yang terdapat di Pakistan, India dan Iran. Tokek ini adalah
                binatang hias dan menjadi hewan peliharaan populer karena warna tubuhnya yang indah dan perawatannya
                yang mudah.”</p>
            <img src="{{ asset('web/images/description-detail-image.png') }}" alt="Description Detail Image">
        </div>
    </div>
</div>

@endsection