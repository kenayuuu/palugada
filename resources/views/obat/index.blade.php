@extends('layouts.template')
@section('title','Data Obat')
@section('navObat','active')

@section('content')
    <h3>Daftar Obat</h3>

    <a href="{{ route('obat.create') }}" class="btn mb-3" style="background-color: #a200f3; color: white;">Tambah Obat</a>

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
                <th>Deskripsi</th>
                <th>Harga</th>
                <th style="width: 1%; white-space: nowrap;">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach($obats as $obat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $obat->nama }}</td>
                    <td>{{ $obat->deskripsi }}</td>
                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td style="white-space: nowrap;">
                        <a href="{{ route('obat.show', $obat->id) }}" class="btn btn-info btn-sm" style="margin-bottom: 4px;">Detail</a>
                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $obats->links() }}
@endsection
