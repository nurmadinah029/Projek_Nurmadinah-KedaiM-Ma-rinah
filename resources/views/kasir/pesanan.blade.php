<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Pesanan Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h3>Daftar Pesanan Masuk</h3>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Waktu Pemesanan</th>
                <th>Nama Makanan</th>
                <th>Jumlah Pesanan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->order_time->format('d-m-Y H:i') }}</td>
                    <td>
                        <ul class="list-unstyled mb-0">
                            @foreach ($order->items as $item)
                                <li class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('storage/menu/' . $item->menu->photo) }}" alt="{{ $item->menu->name }}" width="50" class="me-2 rounded" />
                                    <span>{{ $item->menu->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->items->sum('quantity') }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if ($order->status == 'pending')
                            <span class="badge bg-warning">Menunggu</span>
                        @elseif ($order->status == 'processing')
                            <span class="badge bg-info">Diproses</span>
                        @elseif ($order->status == 'delivered')
                            <span class="badge bg-success">Terkirim</span>
                        @endif
                    </td>
                    <td>
                        @if ($order->status == 'pending')
                            <form action="{{ route('konfirmasi', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi pesanan ini?')">Konfirmasi</button>
                            </form>
                        @elseif ($order->status == 'processing')
                            <form action="{{ route('kirim', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-primary" onclick="return confirm('Kirim pesanan ini?')">Kirim</button>
                            </form>
                        @else
                            <em>Selesai</em>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
