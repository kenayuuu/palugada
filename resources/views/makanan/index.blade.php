@extends('layouts.template')
@section('title','Data Obat')
@section('navMakanan','active')

@section('content')
    <h3>Menu Makanan </h3>

    <a href="{{ route('makanan.create') }}" class="btn mb-3" style="background-color: #a200f3; color: white;">Tambah Menu Makanan</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th style="width: 1%; white-space: nowrap;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makanans as $makanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $makanan->nama }}</td>
                    <td>
                        @foreach($makanan->kategoris as $kategori)
                            <span class="badge bg-primary">{{ $kategori->nama_kategori }}</span>
                        @endforeach
                    </td>
                    <td>{{ $makanan->deskripsi }}</td>
                    <td>Rp {{ number_format($makanan->harga, 0, ',', '.') }}</td>
                    <td style="white-space: nowrap;">
                        <a href="{{ route('makanan.show', $makanan->id) }}" class="btn btn-info btn-sm" style="margin-bottom: 4px;">Detail</a>
                        <a href="{{ route('makanan.edit', $makanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('makanan.destroy', $makanan->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $makanans->links() }}
@endsection
