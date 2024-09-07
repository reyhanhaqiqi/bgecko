@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper" style="background-color: #252635;">
    <div class="page-header">
      <h3 class="page-title text-white">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active text-white" aria-current="page">
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
        <div class="card" style="background-color: #161B2F">
          <div class="card-body">
            <h4 class="card-title text-white">Data Leopard Baru Ditambahkan</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th class="text-white" style="background-color: #161B2F"> Gambar </th>
                    <th class="text-white" style="background-color: #161B2F"> Nama </th>
                    <th class="text-white" style="background-color: #161B2F"> Status </th>
                    <th class="text-white" style="background-color: #161B2F"> Terakhir Ditambahkan </th>
                  </tr>
                </thead>
                <br><br>
                <tbody>
                  <tr t>
                    @foreach ($latestGeckos as $gecko)
                    <td class="text-center" style="background-color: #161B2F">
                      @foreach ($gecko->galleryGeckos as $galleryGecko)
                      <img src="{{ Storage::url('geckos/' . $galleryGecko->url) }}" class="me-2" alt="image">
                      @endforeach
                    </td>
                    <td class="text-center text-white" style="background-color: #161B2F"> {{ $gecko->nama }}
                    </td>
                    <td class="text-center" style="background-color: #161B2F">
                      <label class="badge badge-gradient-success">Terbaru</label>
                    </td class="text-center">
                    <td class="text-center text-white" style="background-color: #161B2F"> {{
                      $gecko->created_at->diffForHumans() }}</td>
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
        <div class="card" style="background-color: #161B2F">
          <div class="card-body">
            <h4 class="card-title text-white">Data Telur Baru Ditambahkan</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th class="text-white" style="background-color: #161B2F"> Gambar </th>
                    <th class="text-white" style="background-color: #161B2F"> Perkawinan </th>
                    <th class="text-white" style="background-color: #161B2F"> Status </th>
                    <th class="text-white" style="background-color: #161B2F"> Terakhir Ditambahkan </th>
                  </tr>
                </thead>
                <br><br>
                <tbody>
                  <tr>
                    @foreach ($latestEggs as $egg)
                    <td class="text-center" style="background-color: #161B2F">
                      <img src="{{ Storage::url('eggs/' . $egg->galleryEggs->url) }}" class="me-2" alt="image">
                    </td>
                    <td class="text-center text-white" style="background-color: #161B2F"> {{ $egg->perkawinan }} </td>
                    <td class="text-center" style="background-color: #161B2F">
                      <label class="badge badge-gradient-success">Terbaru</label>
                    </td class="text-center">
                    <td class="text-center text-white" style="background-color: #161B2F"> {{
                      $egg->created_at->diffForHumans() }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_footer.html -->
    @include('admin.partials.footer')
    <!-- partial -->
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

@endsection