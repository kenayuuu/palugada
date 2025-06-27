<!-- resources/views/obat/edit.blade.php -->
@extends('layouts.template')
@section('title','Edit Obat')
@section('navObat','active')
@section('content')

<h1>Edit Obat</h1>

<form method="POST" action="{{ route('obat.update', $obat->id) }}">
    @csrf
 @method("PUT")

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $obat->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $obat->harga) }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
            @if($obat->cover_image)
                <img src="{{ asset('storage/' . $obat->cover_image) }}" class="img-thumbnail mb-2" width="120">
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
