<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Obat;
use App\Models\Pakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PakaianController extends Controller
{
    public function index()
    {
        $pakaians = Pakaian::latest()->paginate(6);
        return view('pakaian.index', compact('pakaians'));
    }

    public function homepage()
    {
        $obats = Obat::latest()->paginate(6, ['*'], 'obat');
        $makanans = Makanan::latest()->paginate(6, ['*'], 'makanan');
        $pakaians = Pakaian::latest()->paginate(6, ['*'], 'pakaian');

        return view('homepage', compact('obats', 'makanans', 'pakaians'));
    }

    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
        }

        return view('pakaian.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'ukuran' => 'required|array',
            'ukuran.*' => 'in:S,M,L,XL',
            'harga' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp'
        ]);

        $cover = null;
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        Pakaian::create([
            'nama' => $validated['nama'],
            'ukuran' => json_encode($validated['ukuran']),
            'harga' => $validated['harga'],
            'cover_image' => $cover,
        ]);

        return redirect()->route('pakaian.index')->with('success', 'Data pakaian berhasil disimpan');
    }

    public function edit($id)
    {
        if (!Gate::allows('edit')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh mengedit data.');
        }

        $pakaian = Pakaian::findOrFail($id);
        return view('pakaian.edit', compact('pakaian'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('edit')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh mengedit data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'ukuran' => 'required|array',
            'ukuran.*' => 'in:S,M,L,XL',
            'harga' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp'
        ]);

        $pakaian = Pakaian::findOrFail($id);
        $cover = $pakaian->cover_image;

        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        $pakaian->update([
            'nama' => $validated['nama'],
            'ukuran' => json_encode($validated['ukuran']),
            'harga' => $validated['harga'],
            'cover_image' => $cover,
        ]);

        return redirect()->route('pakaian.index')->with('success', 'Data pakaian berhasil diupdate');
    }

    public function show($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        return view('pakaian.detailpakaian', compact('pakaian'));
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menghapus data.');
        }

        $pakaian = Pakaian::findOrFail($id);
        $pakaian->delete();

        return redirect()->route('pakaian.index')->with('success', 'Data pakaian berhasil dihapus');
    }
}
