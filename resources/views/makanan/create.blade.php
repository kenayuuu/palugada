<!-- resources/views/obat/create.blade.php -->
@extends('layouts.template')
@section('title','Tambah Obat')
@section('navMakanan','active')
@section('content')

<h1>Tambah Menu Makanan</h1>

<form action="{{ route('makanan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
    <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
    <div class="col-sm-10">
        <select multiple class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id[]">
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ (collect(old('kategori_id'))->contains($kategori->id)) ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        <small class="text-muted">* Gunakan Ctrl/Command untuk pilih lebih dari satu</small>
        @error('kategori_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @error('kategori_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
                id="cover_image" name="cover_image" accept="image/*">
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn" style="background-color: #a200f3; color: white;">Simpan</button>
</form>

@endsection
