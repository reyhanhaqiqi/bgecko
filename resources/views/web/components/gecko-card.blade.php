<div class="card gecko-card">
    <div id="carouselExampleIndicators{{ $gecko->id }}" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($gecko->galleryGeckos as $index => $galleryGecko)
            <button type="button" data-bs-target="#carouselExampleIndicators{{ $gecko->id }}"
                data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
                aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($gecko->galleryGeckos as $galleryGecko)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ Storage::url('geckos/' . $galleryGecko->url) }}" alt="Gecko Image">
            </div>
            @endforeach
        </div>
    </div>



    <div class="id-number position-absolute align-items-center d-flex justify-content-center">
        <h1>{{ $gecko->id }}</h1>
    </div>

    <div class="card-body">
        <div class="line-1">
            <div class="name">
                <h5 class="card-title">Nama Hewan</h5>
                <p class="card-text text-capitalize">{{ $gecko->nama }}</p>
            </div>

            <div class="type">
                <h5 class="card-title">Tipe Hewan</h5>
                <p class="card-text text-capitalize">{{ $gecko->tipe }}</p>
            </div>
        </div>

        <div class="line-2 mt-3">
            <div class="sex">
                <h5 class="card-title">Jenis Kelamin</h5>
                <p class="card-text text-capitalize">{{ $gecko->jenis_kelamin }}</p>
            </div>

            <div class="born">
                <h5 class="card-title">Kelahiran</h5>
                <p class="card-text">{{ \Carbon\Carbon::parse($gecko->kelahiran)->translatedFormat('d M Y') }}</p>
            </div>
        </div>

        <div class="description mt-3">
            <h5 class="card-title">Deskripsi</h5>
            <p class="card-text text-capitalize">{{ $gecko->deskripsi }}</p>
        </div>

        <div class="family d-inline-block mt-3 mb-3">
            <h5 class="card-title">Perkawinan</h5>
            <p class="card-text text-capitalize">{{ $gecko->perkawinan }}</p>
        </div>
    </div>
</div>