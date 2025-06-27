<!-- resources/views/obat/create.blade.php -->
@extends('layouts.template')
@section('title','Tambah Kategori')
@section('navKategori','active')
@section('content')

<h1>Tambah Kategori</h1>

<form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn" style="background-color: #a200f3; color: white;">Simpan</button>
</form>

@endsection
