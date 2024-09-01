@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Data Leopard Gecko </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"></a>Edit Data</li>
                    <li class="breadcrumb-item active" aria-current="page">Leopard Gecko</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST"
                            action="{{ route('gecko.update', ['gecko' => $gecko->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input required type="text" name="nama" class="form-control" id="exampleInputName1"
                                    value="{{ $gecko->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tipe</label>
                                <input required type="text" name="tipe" class="form-control" id="exampleInputEmail3"
                                    value="{{ $gecko->tipe }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Jenis Kelamin</label>
                                <select required class="form-select" name="jenis_kelamin" id="exampleSelectGender">
                                    <option {{ $gecko->jenis_kelamin == 'jantan' ? 'selected' : ''}}>Jantan</option>
                                    <option {{ $gecko->jenis_kelamin == 'betina' ? 'selected' : ''}}>Betina</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Kelahiran</label>
                                <input required type="date" name="kelahiran" class="form-control" id="exampleInputCity1"
                                    value="{{ $gecko->kelahiran }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="exampleTextarea1"
                                    rows="4">{{ $gecko->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Perkawinan</label>
                                <input required type="text" name="perkawinan" class="form-control"
                                    id="exampleInputCity1" value="{{ $gecko->perkawinan }}">
                            </div>
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input type="file" name="url[]" class="file-upload-default" id="profilePhotoInput"
                                    multiple>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Gambar">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button"
                                            onclick="document.getElementById('profilePhotoInput').click()">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                            <a href="{{ route('gecko.index') }}" class="btn btn-light">Cancel</a>
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
        var fileNames = [];
        for (var i = 0; i < this.files.length; i++) {
            fileNames.push(this.files[i].name);
        }
        document.querySelector('.file-upload-info').value = fileNames.join(', '); 
    });
</script>
@endsection