<div class="card egg-card">
    <div class="id-number position-absolute align-items-center d-flex justify-content-center">
        <h1>{{ $egg->id }}</h1>
    </div>

    <img src="{{ Storage::url('eggs/' . $egg->galleryEggs->url) }}" alt="Egg Image">

    <div class="card-body">

        <div class="name">
            <h5 class="card-title">Tanggal Inkubasi</h5>
            <p class="card-text">{{ \Carbon\Carbon::parse($egg->tanggal_inkubasi)->translatedFormat('d M Y') }}</p>
        </div>

        <div class="description mt-3">
            <h5 class="card-title">Keterangan</h5>
            <p class="card-text text-capitalize">{{ $egg->keterangan }}</p>
        </div>

        <div class="family d-inline-block mt-3 mb-3">
            <h5 class="card-title">Perkawinan</h5>
            <p class="card-text text-capitalize">{{ $egg->perkawinan }}</p>
        </div>
    </div>
</div>