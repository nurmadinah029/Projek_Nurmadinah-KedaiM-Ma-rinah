# Kedai Ma'Rinah

<div align="center">
  <img src="unsulbar.jpeg" alt="Logo Unsulbar" width="200"/>
</div>

## 👩‍🎓 Profil

- *Nama:* Nurmadinah  
- *NIM:* D0223001  
- *Mata Kuliah:* Framework Web Based  
- *Tahun:* 2025

---

## 🎯 Role dan Fitur-fiturnya

- *Admin*
  - Mengelola data menu makanan/minuman
  - Mengelola data pengguna
  - Melihat dan mengelola seluruh pesanan

- *Kasir*
  - Melihat daftar pesanan yang telah dikonfirmasi pembeli
  - Menyelesaikan dan memproses pembayaran

- *Pembeli*
  - Melihat daftar menu
  - Melakukan pemesanan makanan/minuman
  - Melihat riwayat pesanan
  - Mengonfirmasi pesanan yang telah dibuat

---

## 🗃 Struktur Basis Data

### Tabel users

| Nama Field | Tipe Data        | Keterangan                    |
|------------|------------------|-------------------------------|
| id         | bigint (auto)    | Primary key                   |
| name       | varchar          | Nama pengguna                 |
| email      | varchar (unique) | Alamat email                  |
| password   | varchar          | Kata sandi                    |
| role       | enum             | admin / kasir / pembeli       |
| created_at | timestamp        | Tanggal dibuat                |
| updated_at | timestamp        | Tanggal update                |

### Tabel menus

| Nama Field | Tipe Data     | Keterangan              |
|------------|---------------|--------------------------|
| id         | bigint (auto) | Primary key             |
| name       | varchar       | Nama makanan/minuman    |
| price      | decimal(10,2) | Harga satuan            |
| stock      | integer       | Jumlah stok tersedia    |
| created_at | timestamp     | Tanggal dibuat          |
| updated_at | timestamp     | Tanggal update          |

### Tabel orders

| Nama Field   | Tipe Data     | Keterangan                             |
|--------------|---------------|-----------------------------------------|
| id           | bigint (auto) | Primary key                            |
| user_id      | bigint        | Foreign key ke users.id              |
| order_time   | datetime      | Waktu pemesanan                        |
| total_price  | decimal(10,2) | Total harga pesanan                    |
| status       | enum          | pending / processing / delivered / selesai |
| created_at   | timestamp     | Tanggal dibuat                         |
| updated_at   | timestamp     | Tanggal update                         |

### Tabel order_items (Pivot Table)

| Nama Field | Tipe Data     | Keterangan                         |
|------------|---------------|-------------------------------------|
| id         | bigint (auto) | Primary key                        |
| order_id   | bigint        | Foreign key ke orders.id         |
| menu_id    | bigint        | Foreign key ke menus.id          |
| quantity   | integer       | Jumlah item dipesan                |
| created_at | timestamp     | Tanggal dibuat                     |
| updated_at | timestamp     | Tanggal update                     |

---

## 🔗 Relasi Antar Tabel

| Tabel Asal | Tabel Tujuan | Relasi     | Penjelasan                                     |
|------------|---------------|------------|------------------------------------------------|
| users      | orders        | 1 : m      | Satu pengguna bisa memiliki banyak pesanan     |
| orders     | order_items   | 1 : m      | Satu pesanan memiliki banyak item              |
| menus      | order_items   | 1 : m      | Satu menu bisa muncul di banyak item pesanan   |
| orders     | menus         | m : n      | Many-to-many melalui order_items (pivot)     |

---
