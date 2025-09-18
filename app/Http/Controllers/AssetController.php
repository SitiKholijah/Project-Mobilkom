<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Menampilkan semua data aset di halaman dashboard.
     */
    public function index()
    {
        $assets = Asset::all();
        // PERUBAHAN: Mengembalikan view ke 'dashboard'
        return view('dashboard', ['assets' => $assets]);
    }

    /**
     * Menampilkan formulir untuk membuat aset baru.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Menyimpan aset baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'asset_name' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'id_inventory' => 'required|string|unique:assets,id_inventory',
            'serial_number' => 'nullable|string',
        ]);

        // 2. Simpan data ke database
        Asset::create($request->all());

        // 3. Alihkan kembali ke halaman dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Aset berhasil ditambahkan!');
    }

    /**
     * Menampilkan formulir untuk mengedit aset.
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    /**
     * Memperbarui data aset di database.
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'asset_name' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'id_inventory' => 'required|string|unique:assets,id_inventory,' . $asset->id,
            'serial_number' => 'nullable|string',
        ]);

        $asset->update($request->all());

        // PERUBAHAN: Mengembalikan redirect ke route 'dashboard'
        return redirect()->route('dashboard')->with('success', 'Aset berhasil diperbarui!');
    }

    /**
     * Menghapus aset dari database.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        // PERUBAHAN: Mengembalikan redirect ke route 'dashboard'
        return redirect()->route('dashboard')->with('success', 'Aset berhasil dihapus!');
    }
}