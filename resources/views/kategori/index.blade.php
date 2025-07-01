@extends('layouts.template')
@section('title','Data Kategori')
@section('navKategori','active')

@section('content')
    <h1>Menu Kategori</h1>

    @if(Auth::check() && Auth::user()->role === 'admin')
    <a href="{{ route('kategori.create') }}" class="btn mb-3" style="background-color: #a200f3; color: white;">Tambah Kategori</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 5%;">Nama</th>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <th style="width: 1%; white-space: nowrap;">Aksi</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <td style="white-space: nowrap;">
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kategoris->links() }}
@endsection
