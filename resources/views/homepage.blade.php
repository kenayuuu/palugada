@extends('layouts.template')
@section('content')

<style>
    .card-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }
    .card-custom {
        min-height: 200px;
    }
    .card-body h5 {
        font-size: 1.1rem;
        font-weight: bold;
    }
</style>

<h3 class="mb-3">Daftar Obat</h3>
<div class="row">
    @foreach ($obats as $obat)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-custom h-100 shadow-sm">
                <div class="row g-0">
                    <div class="col-5">
                        <img src="{{ asset('storage/' . $obat->cover_image) }}" alt="" class="card-img">
                    </div>
                    <div class="col-7">
                        <div class="card-body d-flex flex-column justify-content-between h-100">
                            <div>
                                <h5 class="card-title">{{ $obat->nama }}</h5>
                                <p class="card-text mb-2">Harga: Rp{{ number_format($obat->harga, 0, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('obat.show', $obat->id) }}" class="btn btn-sm text-white" style="background-color: #a200f3;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-3 mb-5">
    {{ $obats->links() }}
</div>

<h3 class="mb-3">Daftar Makanan</h3>
<div class="row">
    @foreach ($makanans as $makanan)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-custom h-100 shadow-sm">
                <div class="row g-0">
                    <div class="col-5">
                        <img src="{{ asset('storage/' . $makanan->cover_image) }}" alt="" class="card-img">
                    </div>
                    <div class="col-7">
                        <div class="card-body d-flex flex-column justify-content-between h-100">
                            <div>
                                <h5 class="card-title">{{ $makanan->nama }}</h5>
                                <p class="card-text mb-2">Harga: Rp{{ number_format($makanan->harga, 0, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('makanan.show', $makanan->id) }}" class="btn btn-sm text-white" style="background-color: #a200f3;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-3 mb-5">
    {{ $makanans->links() }}
</div>

<h3 class="mb-3">Daftar Pakaian</h3>
<div class="row">
    @foreach ($pakaians as $pakaian)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-custom h-100 shadow-sm">
                <div class="row g-0">
                    <div class="col-5">
                        <img src="{{ asset('storage/' . $pakaian->cover_image) }}" alt="" class="card-img">
                    </div>
                    <div class="col-7">
                        <div class="card-body d-flex flex-column justify-content-between h-100">
                            <div>
                                <h5 class="card-title">{{ $pakaian->nama }}</h5>
                                <p class="card-text mb-2">Harga: Rp{{ number_format($pakaian->harga, 0, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('pakaian.show', $pakaian->id) }}" class="btn btn-sm text-white" style="background-color: #a200f3;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-3 mb-5">
    {{ $pakaians->links() }}
</div>

@endsection
