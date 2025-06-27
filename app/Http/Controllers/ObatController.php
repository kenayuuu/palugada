<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Support\Facades\Gate;
use App\Models\Obat;
use App\Models\Pakaian;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan semua data obat (untuk halaman index)
    public function index()
    {
        $obats = Obat::latest()->paginate(6);
        return view('obat.index', compact('obats'));
    }

    // Tampilkan semua obat
    public function homepage()
    {
       $obats = Obat::latest()->paginate(6, ['*'], 'obat');
        $makanans = Makanan::latest()->paginate(6, ['*'], 'makanan');
        $pakaians = Pakaian::latest()->paginate(6, ['*'], 'pakaian');

        return view('homepage', compact('obats', 'makanans', 'pakaians'));
    }

    // Tampilkan form tambah obat
    public function create()
    {
        $obats = Obat::all();
        return view('obat.create', compact('obats'));
    }

    // Simpan data obat baru
    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
        abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
    }
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp'
        ]);

        $cover = null;

        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        Obat::create([
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'cover_image' => $cover
        ]);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil disimpan');
    }

    // Tampilkan form edit obat
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        if(Gate::allows('edit')){
        }else{
            abort(403, 'Anda bukan admin');
        }
        return view('obat.edit', compact('obat'));
    }

    // Update data obat
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diupdate');
    }

    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.detailobat', compact('obat'));
    }

    // Hapus data obat
    public function destroy($id)
    {
        if(Gate::allows('delete')){
            Obat::destroy($id);
            echo "Delete obat $id";

        }else{
            abort(403, 'Anda bukan admin');
        }
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus');
    }
}
