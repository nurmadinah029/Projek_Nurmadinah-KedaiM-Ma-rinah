<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pembayaran Selesai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h3>Riwayat Pesanan</h3>
    
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>Waktu Pesan</th>
                    <th>Makanan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order-> user -> name}}</td>
                        <td>{{ $order->order_time->format('d-m-Y H:i') }}</td>
                        <td>
                            @foreach ($order->items as $item)
                                <div>{{ $item->menu->name }} (x{{ $item->quantity }})</div>
                            @endforeach
                        </td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            @if($order->status == 'selesai')
                            <span class="badge bg-warning">Selesai</span>
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

</body>
</html>
