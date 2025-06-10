<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function menu(){
        $menu = Menu::with('category')->latest()->get();
        return view('Halaman.menu', compact('menu'));
    }    
    public function halaman(){
        return view('Halaman.index');
    }
    public function admin(){
        return view('Admin.admin');
    }
    public function kasir(){
        return view('kasir.kasir');
    }
    public function blmBayar(){
        return view('kasir.belum-dbyr');
    }
    public function selesai(){
        return view('kasir.selesai');
    }
    public function transaksi(){
        return view('kasir.transksi');
    }
    public function about(){
        return view('Halaman.about');
    }
    public function contact(){
        return view('Halaman.contact');
    }

}
