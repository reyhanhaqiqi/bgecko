@extends('layouts.app')

@section('title', 'Data Leopard Gecko')

@section('content')

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
            @include('web.components.gecko-card')
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card')
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card')
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card')
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card')
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card')
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card')
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card')
        </div>
    </div>
</div>

@endsection