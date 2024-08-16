<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- styling css --}}
    <link rel="stylesheet" href="css/gecko.css">

</head>

<body>
    @extends('layouts.app')

    @section('title', 'Data Leopard Gecko')

    @section('content')
    {{-- navbar section --}}
    @include('user.components.navbar')

    {{-- title section--}}
    <div class="container title-section">
        <div class="row">
            <div class="title col-md-6 col-sm-12">
                <h4>LIST DATA</h4>
                <h1 class="mt-4">Data Leopard Gecko</h1>
            </div>

            <div class="search col-md-6 col-sm-12 position-relative">
                <form action="" method="post">
                    <div class="input-group">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Cari data leopard gecko..."
                            aria-label="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- data gecko section --}}
    <div class="container data-gecko-section">
        <div class="row">
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
                @include('user.components.gecko-card')
            </div>
        </div>
    </div>

    {{-- footer secction --}}
    @include('user.components.footer')
    @endsection
</body>

</html>