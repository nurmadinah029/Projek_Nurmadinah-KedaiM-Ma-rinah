<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h3 class="mb-4"> Menu & Kategori</h3>
        <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Total Menu: <span class="badge bg-primary">{{ $totalMenu }}</span></h5>
            <a href="{{ route('daftar.makanan') }}" class="btn btn-primary">Lihat Menu</a>
        </div>

        {{-- Tabel kategori dan jumlah menu --}}
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Menu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $index => $kat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kat->name }}</td>
                        <td>{{ $kat->menus_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
