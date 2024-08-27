@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Tabel Data telur</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Tabel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Telur</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Telur</h4>
                        <br>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th> Tanggal Inkubasi </th>
                                    <th> Keterangan </th>
                                    <th> Perkawinan </th>
                                    <th> Gambar telur </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eggs as $egg)
                                <tr class="text-center">
                                    <td>{{ \Carbon\Carbon::parse($egg->tanggal_inkubasi)->translatedFormat('d M Y') }}
                                    </td>
                                    <td>{{ $egg->keterangan }}</td>
                                    <td>{{ $egg->perkawinan }}</td>
                                    <td>
                                        <img src="{{ Storage::url('eggs/' . $egg->galleryEggs->url) }}" alt="image"
                                            style="width: 70px; height: 70px" />
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