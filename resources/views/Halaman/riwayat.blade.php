@extends('Halaman.master')
@section('title', 'riwayat pesanan')
@section('content')
    <div class="container mt-5">
        <h3>Riwayat Pesanan</h3>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Waktu Pesan</th>
                    <th>Makanan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Pesanan di terima</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->order_time->format('d-m-Y H:i') }}</td>
                        <td>
                            @foreach ($order->items as $item)
                                <div>{{ $item->menu->name }} (x{{ $item->quantity }})</div>
                            @endforeach
                        </td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            @if ($order->status == 'pending')
                                <span class="badge bg-warning">Menunggu</span>
                            @elseif($order->status == 'processing')
                                <span class="badge bg-info">Diproses</span>
                            @elseif($order->status == 'delivered')
                                <span class="badge bg-success">Dalam perjalan</span>
                            @endif
                        </td>
                        <td>
                            @if ($order->status == 'delivered')
                                <form action="{{ route('konfirmasi.pembeli', $order->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-success"
                                        onclick="return confirm('Pesanan sudah diterima dan dibayar?')">Konfirmasi</button>
                                </form>
                            @elseif ($order->status === 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada riwayat pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
