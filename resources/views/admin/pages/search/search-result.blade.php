@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white"> Hasil Pencarian </h3>
        </div>

        @if($geckos->count() > 0 && $eggs->count() > 0)
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body">
                        <h4 class="card-title text-white">Data Leopard Gecko</h4>
                        <br>
                        <table class="table table-striped" style="table-layout: fixed">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> ID </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Nama </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Tipe </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Jenis Kelamin
                                    </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Kelahiran </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Deskripsi </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Perkawinan </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Gambar </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($geckos as $gecko)
                                <tr class="text-center">
                                    <td class="py-1 text-white"
                                        style="width: 10%; font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->id }}
                                    </td>
                                    <td class="text-capitalize text-white text-wrap"
                                        style="font-size: 12px; line-height: 1.7;  background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->nama }}
                                    </td>
                                    <td class="text-capitalize text-white"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->tipe }}
                                    </td>
                                    <td class="text-capitalize text-white"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->jenis_kelamin }}
                                    </td>
                                    <td class="text-white"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ \Carbon\Carbon::parse($gecko->kelahiran)->translatedFormat('d M Y') }}
                                    </td>
                                    <td style="font-size: 12px; line-height: 1.7; background-color: #161B2F; border: 3px solid #252635;"
                                        class="text-start text-white text-wrap">
                                        {{ $gecko->deskripsi }}
                                    </td>
                                    <td class="text-capitalize text-white text-wrap"
                                        style=" font-size: 12px; line-height: 1.7; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->perkawinan }}
                                    </td>
                                    <td style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column align-items-center">
                                            @foreach ($gecko->galleryGeckos as $galleryGecko)
                                            <img class="d-block mb-2"
                                                src="{{ Storage::url('geckos/' . $galleryGecko->url) }}" alt="Image"
                                                width="100">
                                            @endforeach
                                        </div>
                                    </td>

                                    <td style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column">
                                            <form action="{{ route('gecko.edit', ['gecko' => $gecko->id]) }}"
                                                method="GET">
                                                <button type="submit"
                                                    class="btn btn-gradient-dark btn-icon-text mb-2 ps-4 pe-4">
                                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>Edit
                                                </button>
                                            </form>
                                            <form id="delete-form-{{ $gecko->id }}"
                                                action="{{ route('gecko.destroy', $gecko->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-gradient-danger btn-icon-text ps-3 pe-3"
                                                    onclick="confirmDelete({{ $gecko->id }})">
                                                    <i class="mdi mdi-delete btn-icon-prepend"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br><br>
                        <div class="d-flex justify-content-center">
                            {{ $geckos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body">
                        <h4 class="card-title text-white">Data Telur</h4>
                        <br>
                        </p>
                        <table class="table table-striped" style="table-layout: fixed">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> ID </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Tanggal Inkubasi
                                    </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Keterangan </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Perkawinan </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Gambar telur
                                    </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eggs as $egg)
                                <tr class="text-center text-white" class="text-white"
                                    style="background-color: #161B2F; border: 3px solid #252635;">
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">{{ $egg->id }}
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">{{
                                        \Carbon\Carbon::parse($egg->tanggal_inkubasi)->translatedFormat('d M Y') }}
                                    </td>
                                    <td class="text-capitalize text-start text-white text-wrap"
                                        style="line-height: 1.7;  background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $egg->keterangan }}</td>
                                    <td class="text-capitalize text-white text-wrap"
                                        style="line-height: 1.7;  background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $egg->perkawinan }}</td>
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">
                                        <img src="{{ Storage::url('eggs/' . $egg->galleryEggs->url) }}" alt="image"
                                            style="width: 70px; height: 70px" />
                                    </td>
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column">
                                            <form action="{{ route('egg.edit', ['egg' => $egg->id]) }}" method="GET">
                                                <button type="submit"
                                                    class="btn btn-gradient-dark btn-icon-text mb-2 ps-4 pe-4">
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                    Edit
                                                </button>
                                            </form>
                                            <form id="delete-form-{{ $egg->id }}"
                                                action="{{ route('egg.destroy', $egg->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-gradient-danger btn-icon-text ps-3 pe-3"
                                                    onclick="confirmDelete({{ $egg->id }})">
                                                    <i class="mdi mdi-delete btn-icon-prepend"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br><br>
                        <div class="d-flex justify-content-center">
                            {{ $eggs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($geckos->count() > 0)
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body">
                        <h4 class="card-title text-white">Data Leopard Gecko</h4>
                        <br>
                        <table class="table table-striped" style="table-layout: fixed">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> ID </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Nama </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Tipe </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Jenis Kelamin
                                    </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Kelahiran </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Deskripsi </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Perkawinan </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Gambar </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($geckos as $gecko)
                                <tr class="text-center">
                                    <td class="py-1 text-white"
                                        style="width: 10%; font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->id }}
                                    </td>
                                    <td class="text-capitalize text-white text-wrap"
                                        style="font-size: 12px; line-height: 1.7;  background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->nama }}
                                    </td>
                                    <td class="text-capitalize text-white"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->tipe }}
                                    </td>
                                    <td class="text-capitalize text-white"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->jenis_kelamin }}
                                    </td>
                                    <td class="text-white"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ \Carbon\Carbon::parse($gecko->kelahiran)->translatedFormat('d M Y') }}
                                    </td>
                                    <td style="font-size: 12px; line-height: 1.7; background-color: #161B2F; border: 3px solid #252635;"
                                        class="text-start text-white text-wrap">
                                        {{ $gecko->deskripsi }}
                                    </td>
                                    <td class="text-capitalize text-white text-wrap"
                                        style=" font-size: 12px; line-height: 1.7; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $gecko->perkawinan }}
                                    </td>
                                    <td style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column align-items-center">
                                            @foreach ($gecko->galleryGeckos as $galleryGecko)
                                            <img class="d-block mb-2"
                                                src="{{ Storage::url('geckos/' . $galleryGecko->url) }}" alt="Image"
                                                width="100">
                                            @endforeach
                                        </div>
                                    </td>

                                    <td style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column">
                                            <form action="{{ route('gecko.edit', ['gecko' => $gecko->id]) }}"
                                                method="GET">
                                                <button type="submit"
                                                    class="btn btn-gradient-dark btn-icon-text mb-2 ps-4 pe-4">
                                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>Edit
                                                </button>
                                            </form>
                                            <form id="delete-form-{{ $gecko->id }}"
                                                action="{{ route('gecko.destroy', $gecko->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-gradient-danger btn-icon-text ps-3 pe-3"
                                                    onclick="confirmDelete({{ $gecko->id }})">
                                                    <i class="mdi mdi-delete btn-icon-prepend"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br><br>
                        <div class="d-flex justify-content-center">
                            {{ $geckos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($eggs->count() > 0)
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body">
                        <h4 class="card-title text-white">Data Telur</h4>
                        <br>
                        </p>
                        <table class="table table-striped" style="table-layout: fixed">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> ID </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Tanggal Inkubasi
                                    </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Keterangan </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Perkawinan </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Gambar telur
                                    </th>
                                    <th class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eggs as $egg)
                                <tr class="text-center text-white" class="text-white"
                                    style="background-color: #161B2F; border: 3px solid #252635;">
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">{{ $egg->id }}
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">{{
                                        \Carbon\Carbon::parse($egg->tanggal_inkubasi)->translatedFormat('d M Y') }}
                                    </td>
                                    <td class="text-capitalize text-start text-white text-wrap"
                                        style="line-height: 1.7;  background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $egg->keterangan }}</td>
                                    <td class="text-capitalize text-white text-wrap"
                                        style="line-height: 1.7;  background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $egg->perkawinan }}</td>
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">
                                        <img src="{{ Storage::url('eggs/' . $egg->galleryEggs->url) }}" alt="image"
                                            style="width: 70px; height: 70px" />
                                    </td>
                                    <td class="text-white"
                                        style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column">
                                            <form action="{{ route('egg.edit', ['egg' => $egg->id]) }}" method="GET">
                                                <button type="submit"
                                                    class="btn btn-gradient-dark btn-icon-text mb-2 ps-4 pe-4">
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                    Edit
                                                </button>
                                            </form>
                                            <form id="delete-form-{{ $egg->id }}"
                                                action="{{ route('egg.destroy', $egg->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-gradient-danger btn-icon-text ps-3 pe-3"
                                                    onclick="confirmDelete({{ $egg->id }})">
                                                    <i class="mdi mdi-delete btn-icon-prepend"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br><br>
                        <div class="d-flex justify-content-center">
                            {{ $eggs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container" style="padding: 100px; color: #fff;">
            @include('errors.empty-search')
        </div>
        @endif

        <!-- partial:../../partials/_footer.html -->
        @include('admin.partials.footer')
        <!-- partial -->

    </div>
    <!-- content-wrapper ends -->
</div>
@endsection