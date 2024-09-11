@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white"> Input Data Telur </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary">Input Data</li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Telur</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F;">
                    <div class="card-body text-white">
                        <form class="forms-sample" method="POST" action="{{ route('egg.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputCity1">Tanggal Inkubasi</label>
                                <input required type="text" name="tanggal_inkubasi" class="form-control text-white"
                                    id="exampleInputCity1" placeholder="Tanggal Inkubasi"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Keterangan</label>
                                <textarea required class="form-control text-white" name="keterangan"
                                    id="exampleTextarea1" rows="4"
                                    style="background-color: #0E111E; border: 3px solid #252635;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Perkawinan</label>
                                <input required type="text" name="perkawinan" class="form-control text-white"
                                    id="exampleInputCity1" placeholder="Perkawinan"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input required type="file" name="url" id="profilePhotoInput"
                                    class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info text-white" disabled
                                        placeholder="Upload Gambar"
                                        style="background-color: #0E111E; border: 3px solid #252635;">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button"
                                            onclick="document.getElementById('profilePhotoInput').click()">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
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
    <!-- main-panel ends -->
    @endsection

    @section('scripts')
    <script>
        document.getElementById('profilePhotoInput').addEventListener('change', function() {
                var fileName = this.files[0] ? this.files[0].name : 'Upload Gambar';
                document.querySelector('.file-upload-info').value = fileName;
            });

        $(document).ready(function name() {
            $('#exampleInputCity1').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                language: 'id',
            });
        })
    </script>
    @endsection