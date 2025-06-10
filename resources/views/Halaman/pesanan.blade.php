<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4">Pesanan Saya</h3>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Waktu Pemesanan</th>
                <th>Waktu Pengiriman</th>
                <th>Makanan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->order_time->format('d-m-Y H:i') }}</td>
                    <td>
                        {{ $order->delivery_time ? $order->delivery_time->format('d-m-Y H:i') : '-' }}
                    </td>
                    <td>
                        @foreach($order->items as $item)
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('storage/menu/' . $item->menu->photo) }}" alt="{{ $item->menu->name }}" width="60" class="me-2 rounded">
                                <div>
                                    <strong>{{ $item->menu->name }}</strong><br>
                                    <small>Kategori: {{ $item->menu->category->name ?? '-' }}</small><br>
                                    <small>Jumlah: {{ $item->quantity }}</small>
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if($order->status == 'pending')
                            <span class="badge bg-warning">Menunggu</span>
                        @elseif($order->status == 'processing')
                            <span class="badge bg-info">Diproses</span>
                        @elseif($order->status == 'delivered')
                            <span class="badge bg-success">Dalam perjalan</span>
                        @elseif($order->status == 'selesai')
                            <span class="badge bg-success">pesanan sudah diterima</span>
                        @endif
                    </td>
                    <td>
                        @if($order->status == 'pending')
                            <form action="{{ route('pesanan.batal', $order->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Batalkan</button>
                            </form>
                        @else
                            <span class="text-muted">Tidak bisa dibatalkan</span>
                        @endif
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
