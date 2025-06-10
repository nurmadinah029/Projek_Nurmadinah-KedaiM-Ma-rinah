<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order_items;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
    public function pesanan()
    {
        $orders = Orders::where('user_id', Auth::id())->orderBy('order_time', 'desc')->get();
        return view('halaman.pesanan', compact('orders'));
    }
    public function riwayat()
    {
        $orders = Orders::where('user_id', Auth::id())
            ->where('status', 'delivered')
            ->orderBy('order_time', 'desc')
            ->get();

        return view('Halaman.riwayat', compact('orders'));
    }

    // fungsi ketika klik bayar
    public function bayar(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $menu = Menu::findOrFail($request->menu_id);
        $quantity = $request->quantity;
        $price = $menu->price;
        $subtotal = $price * $quantity;

        // Cek apakah sudah ada order dengan status 'pending'
        $order = Orders::where('user_id', $userId)
            ->where('status', 'pending')
            ->first();

        if (!$order) {
            // Jika belum ada pesanan buat order baru
            $order = Orders::create([
                'user_id' => $userId,
                'order_time' => now(),
                'delivery_time' => now()->addHours(2),
                'total_price' => 0, // nanti dihitung ulang
                'status' => 'pending',
            ]);
        }

        // Cek apakah menu sudah ada di order_items
        $item = Order_items::where('order_id', $order->id)
            ->where('menu_id', $menu->id)
            ->first();

        if ($item) {
            //Jika sudah ada pesanan tambah jumlah dan total harga
            $item->quantity += $quantity;
            $item->price = $price; // update harga jika berubah
            $item->subtotal = $item->quantity * $price;
            $item->save();
        } else {
            // Jika belum ada pesanan, buat item baru
            Order_items::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $menu->price * $quantity,
            ]);
        }

        // Update total_price di orders
        $order->total_price = Order_items::where('order_id', $order->id)->sum('subtotal');
        $order->save();

        return redirect()->route('pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function batal($id)
    {
        $order = Orders::where('id', $id)
            ->where('user_id', Auth::id()) // memastikan user hanya bisa batalkan pesanan sendiri
            ->where('status', 'pending') // hanya yang pending bisa dibatalkan
            ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak dapat dibatalkan.');
        }

        // Hapus order_items dluan krena ini forengkey
        $order->items()->delete();

        // Hapus pesanan
        $order->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
    }

    public function konfirmasi(Orders $order)
    {
        // Pastikan hanya pemilik pesanan yang bisa konfirmasi
        if ($order->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Akses tidak sah.');
        }
        // Hanya bisa konfirmasi kalau statusnya 'delivered'
        if ($order->status === 'delivered') {
            $order->update([
                'status' => 'selesai'
            ]);
            return redirect()->back()->with('success', 'Pesanan telah dikonfirmasi dan ditandai sebagai selesai.');
        }

        return redirect()->back()->with('error', 'Pesanan tidak bisa dikonfirmasi.');
    }
}