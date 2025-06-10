<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function daftar_pesanan()
    {
        $orders = Orders::whereIn('status', ['pending', 'processing'])->orderBy('order_time', 'desc')->get();
        return view('kasir.pesanan', compact('orders'));
    }
    // fungsi untuk tombol konfirmasi
    public function konfirmasi(Orders $order)
    {
        if ($order->status === 'pending') {
            $order->update([
                'status' => 'processing',
            ]);
        }
        return redirect()->back()->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    // funsgi untuk tombol kirim
    public function kirim(Orders $order)
    {
        if ($order->status === 'processing') {
            $order->update([
                'status' => 'delivered',
            ]);
        }
        return redirect()->back()->with('success', 'Pesanan berhasil dikirim.');
    }

    public function belum_bayar()
    {
        $orders = Orders::where('status', 'delivered')
            ->orderBy('order_time', 'desc')
            ->get();

        return view('kasir.belum-bayar', compact('orders'));
    }
    public function selesai()
    {
        $orders = Orders::where('status', 'selesai')
            ->orderBy('order_time', 'desc')
            ->get();

        return view('kasir.selesai', compact('orders'));
    }
}
