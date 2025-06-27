@extends('layouts.template')
@section('content')

<h1>Detail Makanan</h1>
<div class="col-lg-6">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                    <img src="{{ asset('storage/' . $makanan->cover_image) }}" alt="Cover Makanan" class="img-fluid rounded-start">
            </div>

            {{-- Kolom Detail --}}
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $makanan->nama }}</h5>
                    <p class="card-text">Deskripsi: {{ $makanan->deskripsi }}</p>
                    <p class="card-text">
                        Kategori:
                        @foreach($makanan->kategoris as $kategori)
                            <span class="badge bg-success">{{ $kategori->nama_kategori }}</span>
                        @endforeach
                    </p>
                    <p class="card-text">Harga: Rp{{ number_format($makanan->harga, 0, ',', '.') }}</p>
                    <a href="{{ url('/') }}" class="btn" style="background-color: #a200f3; color: white;">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
