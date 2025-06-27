<!-- resources/views/obat/edit.blade.php -->
@extends('layouts.template')
@section('title','Edit Kategori')
@section('navKategori','active')
@section('content')

<h1>Edit Kategori</h1>

<form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
    @csrf


    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $kategori->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn" style="background-color: #b82bff; color: white;">Update</button>
</form>

@endsection
