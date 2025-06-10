<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    // untuk daftar pengguna
    public function index()
    {
        $user = User::all();
        $Pengguna = User::count();
        $Admin = User::where('role', 'admin')->count();
        $Kasir = User::where('role', 'kasir')->count();
        $Pembeli = User::where('role', 'pembeli')->count();

        return view('Statistik.Pengguna.index', compact(
            'user',
            'Pengguna',
            'Admin',
            'Kasir',
            'Pembeli'
        ));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Statistik.Pengguna.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'role' => 'required|in:Admin,Kasir,Pembeli',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
    // end daftar pengguna

    // untuk jumlah menu
    public function jml_menu()
    {
        // Ambil kategori beserta jumlah menu di masing-masing kategori
        $kategori = Categories::withCount('menus')->get();

        // Hitung total seluruh menu
        $totalMenu = Menu::count();

        return view('Statistik.jumlah-menu.jumlah', compact('kategori', 'totalMenu'));
    }
    // end jumlah menu
}
