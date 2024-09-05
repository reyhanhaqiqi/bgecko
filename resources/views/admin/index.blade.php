@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('admin/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Data Leopard Gecko<i
                class="mdi mdi-chart-line mdi-24px float-end"></i>
            </h4>
            <h2 class="mb-5">{{ $geckos }}</h2>
            <h6 class="card-text">Data Terupdate</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('admin/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Data Telur<i
                class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
            </h4>
            <h2 class="mb-5">{{ $eggs }}</h2>
            <h6 class="card-text">Data Terupdate</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('admin/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Semua Data<i class="mdi mdi-diamond mdi-24px float-end"></i>
            </h4>
            <h2 class="mb-5">{{ $totalData }}</h2>
            <h6 class="card-text">Data Leopard Gecko dan Telur</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Leopard Baru Ditambahkan</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th> Gambar </th>
                    <th> Nama </th>
                    <th> Status </th>
                    <th> Terakhir Ditambahkan </th>
                  </tr>
                </thead>
                <br><br>
                <tbody>
                  <tr>
                    @foreach ($latestGeckos as $gecko)
                    <td class="text-center">
                      @foreach ($gecko->galleryGeckos as $galleryGecko)
                      <img src="{{ Storage::url('geckos/' . $galleryGecko->url) }}" class="me-2" alt="image">
                      @endforeach
                    </td>
                    <td class="text-center"> {{ $gecko->nama }} </td>
                    <td class="text-center">
                      <label class="badge badge-gradient-success">Terbaru</label>
                    </td class="text-center">
                    <td class="text-center"> {{ $gecko->created_at->diffForHumans() }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Telur Baru Ditambahkan</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th> Gambar </th>
                    <th> Perkawinan </th>
                    <th> Status </th>
                    <th> Terakhir Ditambahkan </th>
                  </tr>
                </thead>
                <br><br>
                <tbody>
                  <tr>
                    @foreach ($latestEggs as $egg)
                    <td class="text-center">
                      <img src="{{ Storage::url('eggs/' . $egg->galleryEggs->url) }}" class="me-2" alt="image">
                    </td>
                    <td class="text-center"> {{ $egg->perkawinan }} </td>
                    <td class="text-center">
                      <label class="badge badge-gradient-success">Terbaru</label>
                    </td class="text-center">
                    <td class="text-center"> {{ $egg->created_at->diffForHumans() }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('admin.partials.footer')
  <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection