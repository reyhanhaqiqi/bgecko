@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white"> Profile </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white"></a>Profile</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body text-white">
                        <form class="forms-sample" method="POST" action="{{ route('profile.update') }}"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($errors->has('foto_size'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <div>
                                    {{ $errors->first('foto_size') }}
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="exampleInputName1">Nama lengkap</label>
                                <input type="text" name="name" class="form-control text-white" id="exampleInputName1"
                                    value="{{ Auth::user()->name }}"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="email" name="email" class="form-control text-white" id="exampleInputEmail3"
                                    value="{{ Auth::user()->email }}"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Baru</label>
                                <input type="password" name="password" class="form-control text-white"
                                    id="exampleInputPassword1" placeholder="Password"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control text-white"
                                    id="exampleInputPassword2" placeholder="Konfirmasi Password"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label>Upload Foto Profil</label>
                                <input type="file" name="profile_photo_path" id="profilePhotoInput"
                                    class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info text-white" disabled
                                        placeholder="Upload Foto Profil"
                                        style="background-color: #0E111E; border: 3px solid #252635;">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button"
                                            onclick="document.getElementById('profilePhotoInput').click();">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Simpan</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>

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

@section('scripts')
<script>
    document.getElementById('profilePhotoInput').addEventListener('change', function() {
        var fileName = this.files[0] ? this.files[0].name : 'Upload Foto Profil';
        document.querySelector('.file-upload-info').value = fileName;
    });
</script>

@endsection