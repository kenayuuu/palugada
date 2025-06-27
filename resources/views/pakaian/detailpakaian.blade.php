@extends('layouts.template')
@section('content')

<h1>Detail Pakaian</h1>
<div class="col-lg-6">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                @if($pakaian->cover_image)
                    <img src="{{ asset('storage/' . $pakaian->cover_image) }}" alt="Cover Pakaian" class="img-fluid rounded-start">
                @else
                    <img src="https://via.placeholder.com/150" alt="Tidak ada gambar" class="img-fluid rounded-start">
                @endif
            </div>

            {{-- Kolom Detail --}}
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $pakaian->nama }}</h5>

                    <p class="card-text">
                        Ukuran:
                        @foreach(json_decode($pakaian->ukuran ?? '[]') as $ukuran)
                            <span class="badge bg-secondary">{{ $ukuran }}</span>
                        @endforeach
                    </p>

                    <p class="card-text">Harga: Rp{{ number_format($pakaian->harga, 0, ',', '.') }}</p>

                    <a href="{{ route('pakaian.index') }}" class="btn" style="background-color: #a200f3; color: white;">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
