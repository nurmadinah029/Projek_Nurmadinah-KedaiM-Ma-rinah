<h1 align="center">🍽️ Kedai Ma’rina – Pemesanan Makanan Siap Saji</h1>

<p align="center">
  <img src="logo-usulbar.png.jpg" alt="Logo Universitas Sulawesi Barat" width="120"/>
</p>

<p align="center">
<b> Nurmadinah </b>
<b>(D022300)1</b>
</p>

<p align="center">
  <strong>Framework Web Based</strong><br>
  Program Studi Informatika<br>
  Fakultas Teknik<br>
  Universitas Sulawesi Barat<br>
  Majene, 2025
</p>

---

---

## 🎯 Role dan Fitur-fiturnya

### 1. Admin

-   Mengelola data menu, kategori, pengguna, dan pesanan.
-   Menambahkan atau menghapus menu makanan.
-   Melihat laporan transaksi.

### 2. Kasir

-   Memverifikasi dan memproses pesanan dari pembeli.
-   Mengelola status pembayaran dan pengiriman.

### 3. Pembeli

-   Melihat menu makanan.
-   Melakukan pemesanan.
-   Memberikan rating dan ulasan makanan.

---

## 🗂️ Struktur Tabel Database

### 1. Tabel `users`

| Nama Field | Tipe Data | Keterangan                    |
| ---------- | --------- | ----------------------------- |
| id         | INT, PK   | ID unik pengguna              |
| name       | VARCHAR   | Nama pengguna                 |
| email      | VARCHAR   | Email unik                    |
| password   | VARCHAR   | Kata sandi                    |
| role       | ENUM      | ['admin', 'kasir', 'pembeli'] |
| created_at | TIMESTAMP | Tanggal dibuat                |

### 2. Tabel `menus`

| Nama Field  | Tipe Data | Keterangan        |
| ----------- | --------- | ----------------- |
| id          | INT, PK   | ID menu           |
| name        | VARCHAR   | Nama makanan      |
| description | TEXT      | Deskripsi makanan |
| price       | DECIMAL   | Harga             |
| photo       | VARCHAR   | URL foto          |
| category_id | INT       | FK ke kategori    |
| created_at  | TIMESTAMP | Tanggal dibuat    |

### 3. Tabel `categories`

| Nama Field | Tipe Data | Keterangan    |
| ---------- | --------- | ------------- |
| id         | INT, PK   | ID kategori   |
| name       | VARCHAR   | Nama kategori |

### 4. Tabel `orders`

| Nama Field    | Tipe Data | Keterangan                             |
| ------------- | --------- | -------------------------------------- |
| id            | INT, PK   | ID pesanan                             |
| user_id       | INT       | FK ke users                            |
| order_time    | DATETIME  | Waktu pemesanan                        |
| delivery_time | DATETIME  | Waktu pengiriman                       |
| total_price   | DECIMAL   | Total harga                            |
| status        | ENUM      | ['pending', 'processing', 'delivered'] |

### 5. Tabel `order_items`

| Nama Field | Tipe Data | Keterangan       |
| ---------- | --------- | ---------------- |
| id         | INT, PK   | ID item          |
| order_id   | INT       | FK ke orders     |
| menu_id    | INT       | FK ke menus      |
| quantity   | INT       | Jumlah           |
| subtotal   | DECIMAL   | Total harga item |

### 6. Tabel `reviews`

| Nama Field | Tipe Data | Keterangan     |
| ---------- | --------- | -------------- |
| id         | INT, PK   | ID ulasan      |
| user_id    | INT       | FK ke users    |
| menu_id    | INT       | FK ke menus    |
| rating     | INT       | Nilai 1–5      |
| comment    | TEXT      | Isi ulasan     |
| created_at | TIMESTAMP | Tanggal dibuat |

---

## 🔁 Relasi Antar Tabel

-   `users` ↔ `orders` : One-to-Many
-   `orders` ↔ `order_items` : One-to-Many
-   `menus` ↔ `order_items` : Many-to-Many (melalui `order_items`)
-   `menus` ↔ `reviews` : One-to-Many
-   `users` ↔ `reviews` : One-to-Many
