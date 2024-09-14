@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white"> Tabel Data Leopard Gecko </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary"><a>Tabel</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Data Leopard gecko</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title text-white">Data Leopard Gecko</h4>
                            <a href="{{ route('gecko.export') }}" class="btn btn-success">
                                <i class="fa fa-file-excel"></i> Export to Excel
                            </a>
                        </div>
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
                                        {{ $gecko->line_albino }}
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
        <!-- partial:../../partials/_footer.html -->
        @include('admin.partials.footer')
        <!-- partial -->
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
    Swal.fire({
        title: 'Anda yakin?',
        text: 'Ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
            Swal.fire('Terhapus!', '', 'Sukses');
        } 
    });
    }
</script>