<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Categories;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::with('category')->latest()->get();
        return view('Admin.daftar-makanan', compact('menu'));
    }
    //fungsi untuk menampilkan halaman tambah makanan
    public function tambah()
    {
        $categories = Categories::all();
        return view('Admin.tambah', compact('categories'));
    }
// end fungsi

// fungsi simppan makanan
    public function simpan(Request $request)
    {
        // proses validasi inputan agar sesuai
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);
        // end proses

        // proses simpan file potonya
        $image = $request->file('photo');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $resized = Image::make($image)->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        });
        // $resized->save(public_path('storage/menu/' . $filename));
        // simpan ke folder public/storage/menu
        $resized->save(public_path('storage' . DIRECTORY_SEPARATOR . 'menu' . DIRECTORY_SEPARATOR . $filename));

        // end proses

        // ini unuk memasukan datanya ke dalam database
        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $filename,
            'category_id' => $request->category_id,
        ]);
        // end
        return redirect()->route('daftar.makanan')->with('success', 'Menu berhasil ditambahkan');
    }
    // end fungsi 

    // tampilkan form edit
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Categories::all();
        return view('Admin.edit', compact('menu', 'categories'));
    }

    // fungsi untuk update data makanan
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        // jika ada gambar baru, simpan
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $resized = Image::make($image)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            $resized->save(public_path('storage/menu/' . $filename));

            // hapus foto lama jika ada
            if ($menu->photo && file_exists(public_path('storage/menu/' . $menu->photo))) {
                unlink(public_path('storage/menu/' . $menu->photo));
            }

            $menu->photo = $filename;
        }

        // update data lainnya
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('daftar.makanan')->with('success', 'Menu berhasil diperbarui');
    }

    // fungsi untuk menghapus menu
    public function delete($id)
    {
        $menu = Menu::findOrFail($id);

        // hapus foto jika ada
        if ($menu->photo && file_exists(public_path('storage/menu/' . $menu->photo))) {
            unlink(public_path('storage/menu/' . $menu->photo));
        }

        $menu->delete();

        return redirect()->route('daftar.makanan')->with('success', 'Menu berhasil dihapus');
    }
    public function detail($id)
    {
        $menu = Menu::with('category')->findOrFail($id);
        return view('Halaman.detail', compact('menu'));
    }
}