@extends('layouts.app')

@section('title', 'Perawatan Leopard Gecko')

@section('content')

{{-- body section --}}
<div class="container body-section">
    <div class="row section-1">
        <div class="col-md-6 text-center">
            <img src="{{ asset('web/images/illustration-image1.png') }}" alt="Illustration">
        </div>
        <div class="col-md-6">
            <h4>TENTANG PERAWATAN</h4>
            <h1 class="mt-4">Apa itu perawatan<br><span>Leopard Gecko?</span></h1>
            <p>“Perawatan leopard gecko berarti semua tindakan yang diperlukan untuk menjaga kesehatan, kenyamanan,
                dan kebahagiaan leopard gecko sebagai hewan peliharaan. Ini mencakup memberi makan yang tepat,
                menjaga kebersihan kandang, memastikan suhu dan kelembapan yang sesuai, serta memberikan perhatian
                medis bila diperlukan. Intinya, perawatan adalah segala upaya yang dilakukan untuk memenuhi
                kebutuhan fisik dan mental leopard gecko agar mereka bisa hidup sehat dan nyaman.”</p>
        </div>
    </div>

    <div class="row section-2">
        <div class="col-md-6">
            <h4>TATA CARA PERAWATAN</h4>
            <h1 class="mt-4">Cara merawat<br><span>Leopard Gecko?</span></h1>
            <p>Download file pdf yang tersedia untuk membaca semua tata cara perawatan hingga semua gentik mengenai
                Leopard Gecko !</p>
            <div class="button">
                <a href="{{ asset('web/files/HandbookLeopardGecko_DawnOfGecko (BGecko).pdf') }}" download>Download
                    File</a>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('web/images/illustration-image2.png') }}" alt="Illustration">
        </div>
    </div>
</div>

@endsection