<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Menu Makanan</h3>
        <a href="{{ route('tambah') }}" class="btn btn-primary">+ Tambah Menu</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Dibuat Pada</th>
                    <th>aksi</th>

                </tr>
            </thead>
            <tbody>
                @forelse($menu as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/menu/' . $m->photo) }}" alt="{{ $m->name }}" width="80" class="rounded">
                        </td>
                        <td>{{ $m->name }}</td>
                        <td>{{ $m->description }}</td>
                        <td>Rp {{ number_format($m->price, 0, ',', '.') }}</td>
                        <td>{{ $m->category->name ?? '-' }}</td>
                        <td>{{ $m->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('menu.edit',$m->id) }}" class="btn btn-sm btn-warning mb-1">edit</a>
                            <form action="{{ route('menu.delete', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data menu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
