@extends('layouts.template')
@section('content')

<h3>Daftar Obat</h3>

<div class="row">
    @foreach ($obats as $obat)
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                            <img src="{{ asset('storage/' . $obat->cover_image) }}" alt="" class="img-fluid rounded-start">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $obat->nama }}</h5>
                            <p class="card-text">Harga: Rp{{ number_format($obat->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('obat.show', $obat->id) }}" class="btn" style="background-color: #a200f3; color: white;">Detail</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $obats->links() }}
    </div>
</div>

<h3>Daftar Makanan</h3>

<div class="row">
    @foreach ($makanans as $makanan)
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                            <img src="{{ asset('storage/' . $makanan->cover_image) }}" alt="" class="img-fluid rounded-start">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $makanan->nama }}</h5>
                            <p class="card-text">Harga: Rp{{ number_format($makanan->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('makanan.show', $makanan->id) }}" class="btn" style="background-color: #a200f3; color: white;">Detail</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $makanans->links() }}
    </div>
</div>

<h3>Daftar Pakaian</h3>

<div class="row">
    @foreach ($pakaians as $pakaian)
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                            <img src="{{ asset('storage/' . $pakaian->cover_image) }}" alt="" class="img-fluid rounded-start">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pakaian->nama }}</h5>
                            <p class="card-text">Harga: Rp{{ number_format($pakaian->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('pakaian.show', $pakaian->id) }}" class="btn" style="background-color: #a200f3; color: white;">Detail</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $pakaians->links() }}
    </div>
</div>
@endsection
