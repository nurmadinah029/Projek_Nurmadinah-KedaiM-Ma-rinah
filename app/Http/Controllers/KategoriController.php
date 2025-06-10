<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
     public function Kategory()
    {
        $kategori = Categories::with('menus')->get();
        return view('Admin.daftar-kategori', compact('kategori'));
    }
    // fungsi untuk menampilkan halaman tambah kategory
    public function kategori()
    {
        return view('admin.category');
    }
    // end fungsi

    // fungsi untuk simpan kategorinya
    public function simpanKategori(Request $request)
    {
        // validasi inputan
        $request->validate([
            'name' => 'required|string|max:255'
        ], [
            'name.required' => 'wajib di isi',
            'name.string' => 'format nya text',
            'name.max' => 'maksimal karakter 255',
        ]);
        // end validasi

        // proses simpan ke databases
        Categories::create([
            'name' => $request->name
        ]);
        // end proses
        return redirect()->route('Kategory')->with('success', 'Kategori berhasil ditambahkan.');
    }
    // end fungsi
    public function delete($id)
    {
        $kategori = Categories::findOrFail($id);
        $kategori->delete();
        return redirect()->route('Kategory')->with('success', 'kategori berhasil dihapus');
    }
}
