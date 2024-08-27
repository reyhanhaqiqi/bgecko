@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tabel Data Leopard Gecko </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Tabel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Leopard gecko</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Leopard Gecko</h4>
                        <br>
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th> Nama </th>
                                    <th> Tipe </th>
                                    <th> Jenis Kelamin </th>
                                    <th> Kelahiran </th>
                                    <th> Deskripsi </th>
                                    <th> Perkawinan </th>
                                    <th> Gambar </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($geckos as $gecko)
                                <tr class="text-center">
                                    <td class="py-1">
                                        {{ $gecko->nama }}
                                    </td>
                                    <td>
                                        {{ $gecko->tipe }}
                                    </td>
                                    <td>
                                        {{ $gecko->jenis_kelamin }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($gecko->kelahiran)->translatedFormat('d M Y') }}
                                    </td>
                                    <td>
                                        {{ $gecko->deskripsi }}
                                    </td>
                                    <td>
                                        {{ $gecko->perkawinan }}
                                    </td>
                                    <td>
                                        <img src="{{ Storage::url('geckos/' . $gecko->galleryGeckos->url) }}"
                                            alt="image" style="width: 70px; height: 70px" />
                                        <img src="{{ Storage::url('geckos/' . $gecko->galleryGeckos->url) }}"
                                            alt="image" style="width: 70px; height: 70px" />
                                        <img src="{{ Storage::url('geckos/' . $gecko->galleryGeckos->url) }}"
                                            alt="image" style="width: 70px; height: 70px" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('admin.partials.footer')
    <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection