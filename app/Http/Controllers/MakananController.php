<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Makanan;
use App\Models\Obat;
use App\Models\Pakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MakananController extends Controller
{
    // Menampilkan semua data makanan (untuk halaman index)
    public function index()
    {
        $makanans = Makanan::latest()->paginate(6);
        return view('makanan.index', compact('makanans'));
    }

    // Tampilkan semua data untuk homepage
    public function homepage()
    {
        $obats = Obat::latest()->paginate(6, ['*'], 'obat');
        $makanans = Makanan::latest()->paginate(6, ['*'], 'makanan');
        $pakaians = Pakaian::latest()->paginate(6, ['*'], 'pakaian');

        return view('homepage', compact('obats', 'makanans', 'pakaians'));
    }

    // Tampilkan form tambah makanan
    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
        }

        $kategoris = Kategori::all();
        return view('makanan.create', compact('kategoris'));
    }

    // Simpan data makanan baru
    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|array',
            'kategori_id.*' => 'exists:niken_kategori,id',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp'
        ]);

        $cover = null;
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        $makanan = Makanan::create([
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'cover_image' => $cover
        ]);

        $makanan->kategoris()->attach($validated['kategori_id']);

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil disimpan');
    }

    // Tampilkan form edit makanan
    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);

        if (!Gate::allows('edit')) {
            abort(403, 'Anda bukan admin');
        }

        $kategoris = Kategori::all();
        return view('makanan.edit', compact('makanan', 'kategoris'));
    }

    // Update data makanan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|array',
            'kategori_id.*' => 'exists:niken_kategori,id',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp'
        ]);

        $makanan = Makanan::findOrFail($id);

        $cover = $makanan->cover_image;
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        $makanan->update([
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'cover_image' => $cover
        ]);

        $makanan->kategoris()->sync($validated['kategori_id']);

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil diupdate');
    }

    // Tampilkan detail makanan
    public function show($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('makanan.detailmakanan', compact('makanan'));
    }

    // Hapus data makanan
    public function destroy($id)
    {
        if (!Gate::allows('delete')) {
            abort(403, 'Anda bukan admin');
        }

        $makanan = Makanan::findOrFail($id);
        $makanan->delete();

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil dihapus');
    }
}
