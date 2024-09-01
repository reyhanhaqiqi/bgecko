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
                                    <th> ID </th>
                                    <th> Nama </th>
                                    <th> Tipe </th>
                                    <th> Jenis Kelamin </th>
                                    <th> Kelahiran </th>
                                    <th> Deskripsi </th>
                                    <th> Perkawinan </th>
                                    <th> Gambar </th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($geckos as $gecko)
                                <tr class="text-center">
                                    <td class="py-1">
                                        {{ $gecko->id }}
                                    </td>
                                    <td>
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
                                        @foreach ($gecko->galleryGeckos as $galleryGecko)
                                        <img src="{{ Storage::url('geckos/' . $galleryGecko->url) }}" alt="Image"
                                            width="100">
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <form action="{{ route('gecko.edit', ['gecko' => $gecko->id]) }}"
                                                method="GET">
                                                <button type="submit" class="btn btn-gradient-dark btn-icon-text mb-2">
                                                    <i class="mdi mdi-file-check btn-icon-append"></i>
                                                    Edit
                                                </button>
                                            </form>
                                            <form id="delete-form-{{ $gecko->id }}"
                                                action="{{ route('gecko.destroy', $gecko->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-gradient-danger btn-icon-text"
                                                    onclick="confirmDelete({{ $gecko->id }})">
                                                    <i class="mdi mdi-delete-alert btn-icon-prepend"></i> Delete
                                                </button>
                                            </form>
                                        </div>
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