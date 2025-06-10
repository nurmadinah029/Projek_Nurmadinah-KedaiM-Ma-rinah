<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3>Edit Pengguna</h3>

    <form action="{{ route('pengguna.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Kasir" {{ $user->role == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                <option value="Pembeli" {{ $user->role == 'Pembeli' ? 'selected' : '' }}>Pembeli</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pengguna') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
