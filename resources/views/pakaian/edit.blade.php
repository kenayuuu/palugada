@extends('layouts.template')
@section('title','Edit Pakaian')
@section('navPakaian','active')
@section('content')

<h1>Edit Pakaian</h1>

<form method="POST" action="{{ route('pakaian.update', $pakaian->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $pakaian->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $pakaian->harga) }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Pilih Ukuran (multiple) --}}
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Ukuran</label>
        <div class="col-sm-10">
            <select name="ukuran[]" class="form-control @error('ukuran') is-invalid @enderror" multiple>
                @php
                    $ukuranTersimpan = old('ukuran', json_decode($pakaian->ukuran ?? '[]'));
                    $daftarUkuran = ['S', 'M', 'L', 'XL', 'XXL'];
                @endphp
                @foreach($daftarUkuran as $ukuran)
                    <option value="{{ $ukuran }}" {{ in_array($ukuran, $ukuranTersimpan) ? 'selected' : '' }}>
                        {{ $ukuran }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">* Gunakan Ctrl/Command untuk pilih lebih dari satu</small>
            @error('ukuran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Cover Image --}}
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
            @if($pakaian->cover_image)
                <img src="{{ asset('storage/' . $pakaian->cover_image) }}" class="img-thumbnail mb-2" width="120">
            @endif
            <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
            @error('cover_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn" style="background-color: #b82bff; color: white;">Update</button>
</form>

@endsection
