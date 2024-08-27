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
                                    <th> Aksi </th>
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
                                    <td>
                                        <div class="d-flex flex-column">
                                            <button type="button" class="btn btn-gradient-dark btn-icon-text mb-2">
                                                <i class="mdi mdi-file-check btn-icon-append"></i>
                                                Edit
                                            </button>
                                            <form id="delete-form-{{ $egg->id }}"
                                                action="{{ route('egg.destroy', $egg->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-gradient-danger btn-icon-text"
                                                    onclick="confirmDelete({{ $egg->id }})">
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