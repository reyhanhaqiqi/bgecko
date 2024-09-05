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
            <form action="{{ route('gecko.search') }}" method="GET">
                <div class="input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" name="query" class="form-control" placeholder="Cari data leopard gecko..."
                        aria-label="Search">
                </div>
            </form>
        </div>
    </div>
</div>

{{-- data gecko section --}}
<div class="container data-gecko-section">
    <div class="row">
        @if($geckos->isEmpty())
        <div class="col-12 text-center">
            @include('errors.empty-search')
        </div>
        @else
        @foreach ($geckos as $gecko)
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.gecko-card', compact('gecko'))
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection