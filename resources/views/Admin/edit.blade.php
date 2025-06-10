<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>tambah makanan</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Menu Makanan</h2>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-3">
                <label for="name" class="form-label">Nama Makanan</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $menu->name) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description', $menu->description) }}</textarea>
            </div>
    
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $menu->price) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label class="form-label">Foto Saat Ini:</label><br>
                @if($menu->photo)
                    <img src="{{ asset('storage/menu/' . $menu->photo) }}" width="150" class="img-thumbnail mb-2">
                @else
                    <p><em>Tidak ada foto</em></p>
                @endif
            </div>
    
            <div class="mb-3">
                <label for="photo" class="form-label">Ganti Foto (Opsional)</label>
                <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
            </div>
    
            <button type="submit" class="btn btn-primary">Update Menu</button>
            <a href="{{ route('daftar.makanan') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>