@extends('layouts.template')
@section('title','Data Pakaian')
@section('navPakaian','active')

@section('content')
    <h3>Daftar Pakaian</h3>

    <a href="{{ route('pakaian.create') }}" class="btn mb-3" style="background-color: #a200f3; color: white;">Tambah Pakaian</a>

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
                <th>Ukuran</th>
                <th>Harga</th>
                <th style="width: 1%; white-space: nowrap;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakaians as $pakaian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pakaian->nama }}</td>
                    <td>
                        @foreach(json_decode($pakaian->ukuran ?? '[]') as $ukuran)
                            <span class="badge bg-secondary">{{ $ukuran }}</span>
                        @endforeach
                    </td>
                    <td>Rp {{ number_format($pakaian->harga, 0, ',', '.') }}</td>

                    <td style="white-space: nowrap;">
                        <a href="{{ route('pakaian.show', $pakaian->id) }}" class="btn btn-info btn-sm mb-1">Detail</a>
                        <a href="{{ route('pakaian.edit', $pakaian->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                        <form action="{{ route('pakaian.destroy', $pakaian->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pakaians->links() }}
@endsection
