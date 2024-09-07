@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white">Tabel Data telur</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary"><a>Tabel</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Data Telur</li>
                </ol>
            </nav>
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