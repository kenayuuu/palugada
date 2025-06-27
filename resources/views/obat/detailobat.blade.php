@extends('layouts.template')
@section('content')

<h1>Detail Obat</h1>
<div class="col-lg-6">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                    <img src="{{ asset('storage/' . $obat->cover_image) }}" alt="Cover Obat" class="img-fluid rounded-start">
            </div>

            {{-- Kolom Detail --}}
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $obat->nama }}</h5>
                    <p class="card-text">Deskripsi: {{ $obat->deskripsi }}</p>
                    <p class="card-text">Harga: Rp{{ number_format($obat->harga, 0, ',', '.') }}</p>
                    <a href="{{ url('/') }}" class="btn" style="background-color: #a200f3; color: white;">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
