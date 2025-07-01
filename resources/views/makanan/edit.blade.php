<!-- resources/views/obat/edit.blade.php -->
@extends('layouts.template')
@section('title','Edit Makanan')
@section('navMakanan','active')
@section('content')

<h1>Edit Menu Makanan</h1>

<form method="POST" enctype="multipart/form-data" action="{{ route('makanan.update', $makanan->id) }}">
    @csrf
     @method('PUT')

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $makanan->nama) }}">
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
                <option value="{{ $kategori->id }}"
                    {{ (in_array($kategori->id, old('kategori_id', $makanan->kategoris->pluck('id')->toArray()))) ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        <small class="text-muted">* Gunakan Ctrl/Command untuk pilih lebih dari satu</small>
        @error('kategori_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi', $makanan->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $makanan->harga) }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
            @if($makanan->cover_image)
                <img src="{{ asset('storage/' . $makanan->cover_image) }}" class="img-thumbnail mb-2" width="120">
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
