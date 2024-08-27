@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Input Data Leopard Gecko </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"></a>Input Data</li>
                    <li class="breadcrumb-item active" aria-current="page">Input Data Leopard Gecko</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('gecko.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input required type="text" name="nama" class="form-control" id="exampleInputName1"
                                    placeholder="Nama leopard Gecko">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tipe</label>
                                <input required type="text" name="tipe" class="form-control" id="exampleInputEmail3"
                                    placeholder="Tipe Leopard Gecko">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Jenis Kelamin</label>
                                <select required class="form-select" name="jenis_kelamin" id="exampleSelectGender">
                                    <option>Jantan</option>
                                    <option>Betina</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Kelahiran</label>
                                <input required type="date" name="kelahiran" class="form-control" id="exampleInputCity1"
                                    placeholder="Tanggal Kelahiran">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="exampleTextarea1"
                                    rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Perkawinan</label>
                                <input required type="text" name="perkawinan" class="form-control"
                                    id="exampleInputCity1" placeholder="Perkawinan">
                            </div>
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input required type="file" name="url" class="file-upload-default"
                                    id="profilePhotoInput">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Gambar">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button"
                                            onclick="document.getElementById('profilePhotoInput').click()">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('admin.partials.footer')
        <!-- partial -->
    </div>
</div>
<!-- main-panel ends -->
@endsection

@section('scripts')
<script>
    document.getElementById('profilePhotoInput').addEventListener('change', function() {
        var fileName = this.files[0] ? this.files[0].name : 'Upload Gambar';
        document.querySelector('.file-upload-info').value = fileName; 
    });
</script>
@endsection