<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
        }

        return view('kategori.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
        }

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (!Gate::allows('edit')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh mengedit data.');
        }

        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('edit')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh mengedit data.');
        }

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menghapus data.');
        }

        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
