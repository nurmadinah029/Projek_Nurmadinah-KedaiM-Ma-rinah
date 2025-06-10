<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4">Statistik Pengguna</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Role</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Admin</td>
                <td>{{ $Admin }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Kasir</td>
                <td>{{ $Kasir }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pembeli</td>
                <td>{{ $Pembeli }}</td>
            </tr>
            <tr class="table-secondary">
                <td colspan="2" class="text-end fw-bold">Total</td>
                <td><strong>{{ $Pengguna }}</strong></td>
            </tr>
        </tbody>
    </table>

    {{-- Tabel Data Pengguna --}}
    <h4 class="mb-3">Detail Pengguna</h4>
    <table class="table table-bordered table-hover">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user as $us)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $us->name }}</td>
                    <td>{{ $us->email }}</td>
                    <td>{{ ucfirst($us->role) }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit',$us->id) }}" class="btn btn-sm btn-warning mb-1">edit</a>
                        <form action="{{ route('pengguna.delete', $us->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
