<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori & Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4">Daftar Kategori & Menu</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nama Makanan</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Ditambahkan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($kategori as $k)
                    @if($k->menus->count())
                        @foreach($k->menus as $menu)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $k->name }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/menu/' . $menu->photo) }}" alt="{{ $menu->name }}" width="80" class="rounded">
                                </td>
                                <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td>{{ $menu->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('kategori.delete', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $k->name }}</td>
                            <td colspan="4" class="text-muted text-center">Belum ada menu</td>
                            <td>
                                <form action="{{ route('kategori.delete', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
