@extends('layouts.template')
@section('title','Data Kategori')
@section('navKategori','active')

@section('content')
    <h1>Menu Kategori</h1>

    <a href="{{ route('kategori.create') }}" class="btn mb-3" style="background-color: #a200f3; color: white;">Tambah Kategori</a>

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
                <th style="width: 1%; white-space: nowrap;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td style="white-space: nowrap;">

                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kategoris->links() }}
@endsection
