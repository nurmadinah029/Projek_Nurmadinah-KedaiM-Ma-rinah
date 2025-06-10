<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil Proyek Kedai Ma'Rinah</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
    }
    h2, h3 {
      text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #888;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    ul li {
      margin-bottom: 6px;
    }
  </style>
</head>
<body>
  <h2>Kedai Ma'Rinah</h2>
  <div align="center">
    <img src="unsulbar.jpeg" width="300" alt="Logo Unsulbar" />
  </div>
  <h2>Nurmadinah</h2>
  <h2>D0223001</h2>
  <h2>Framework Web Based</h2>
  <h2>2025</h2>

  <h3>Role dan Fitur-fiturnya</h3>
  <ul>
    <li><strong>Admin:</strong> Mengelola menu, pengguna, dan pesanan.</li>
    <li><strong>Kasir:</strong> Melihat dan menyelesaikan pembayaran pesanan yang telah dikonfirmasi.</li>
    <li><strong>Pembeli:</strong> Melakukan pemesanan makanan, melihat riwayat, dan mengonfirmasi pesanan.</li>
  </ul>

  <h3>Tabel <code>users</code></h3>
  <table>
    <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    <tr><td>id</td><td>bigint (auto)</td><td>Primary key</td></tr>
    <tr><td>name</td><td>varchar</td><td>Nama pengguna</td></tr>
    <tr><td>email</td><td>varchar (unique)</td><td>Alamat email</td></tr>
    <tr><td>password</td><td>varchar</td><td>Kata sandi</td></tr>
    <tr><td>role</td><td>enum</td><td>admin / kasir / pembeli</td></tr>
    <tr><td>created_at</td><td>timestamp</td><td>Tanggal dibuat</td></tr>
    <tr><td>updated_at</td><td>timestamp</td><td>Tanggal update</td></tr>
  </table>

  <h3>Tabel <code>menus</code></h3>
  <table>
    <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    <tr><td>id</td><td>bigint (auto)</td><td>Primary key</td></tr>
    <tr><td>name</td><td>varchar</td><td>Nama makanan/minuman</td></tr>
    <tr><td>price</td><td>decimal(10,2)</td><td>Harga satuan</td></tr>
    <tr><td>stock</td><td>integer</td><td>Jumlah stok tersedia</td></tr>
    <tr><td>created_at</td><td>timestamp</td><td>Tanggal dibuat</td></tr>
    <tr><td>updated_at</td><td>timestamp</td><td>Tanggal update</td></tr>
  </table>

  <h3>Tabel <code>orders</code></h3>
  <table>
    <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    <tr><td>id</td><td>bigint (auto)</td><td>Primary key</td></tr>
    <tr><td>user_id</td><td>bigint</td><td>Foreign key ke users.id</td></tr>
    <tr><td>order_time</td><td>datetime</td><td>Waktu pemesanan</td></tr>
    <tr><td>total_price</td><td>decimal(10,2)</td><td>Total harga pesanan</td></tr>
    <tr><td>status</td><td>enum</td><td>pending / processing / delivered / selesai</td></tr>
    <tr><td>created_at</td><td>timestamp</td><td>Tanggal dibuat</td></tr>
    <tr><td>updated_at</td><td>timestamp</td><td>Tanggal update</td></tr>
  </table>

  <h3>Tabel <code>order_items</code></h3>
  <table>
    <tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    <tr><td>id</td><td>bigint (auto)</td><td>Primary key</td></tr>
    <tr><td>order_id</td><td>bigint</td><td>Foreign key ke orders.id</td></tr>
    <tr><td>menu_id</td><td>bigint</td><td>Foreign key ke menus.id</td></tr>
    <tr><td>quantity</td><td>integer</td><td>Jumlah pesanan</td></tr>
    <tr><td>created_at</td><td>timestamp</td><td>Tanggal dibuat</td></tr>
    <tr><td>updated_at</td><td>timestamp</td><td>Tanggal update</td></tr>
  </table>

  <h3>Relasi Antar Tabel</h3>
  <table>
    <tr><th>Tabel Asal</th><th>Tabel Tujuan</th><th>Relasi</th><th>Penjelasan</th></tr>
    <tr><td>users</td><td>orders</td><td>1 : m</td><td>Satu pembeli bisa memiliki banyak pesanan</td></tr>
    <tr><td>orders</td><td>order_items</td><td>1 : m</td><td>Satu pesanan bisa berisi banyak item</td></tr>
    <tr><td>menus</td><td>order_items</td><td>1 : m</td><td>Satu menu bisa dipesan di banyak pesanan</td></tr>
  </table>
</body>
</html>