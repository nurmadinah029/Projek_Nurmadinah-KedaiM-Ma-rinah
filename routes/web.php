    <?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
    use App\Http\Controllers\MenuController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\TampilanController;
    use Illuminate\Support\Facades\Route;

    Route::controller(TampilanController::class)->group(function () {
        Route::get('/halaman/menu', 'menu')->name('menu');
        Route::get('/halaman/about', 'about')->name('about');
        Route::get('/halaman/contact', 'contact')->name('contact');
        Route::get('/halaman', 'halaman')->name('halaman');
        Route::get('/admin', 'admin');
        Route::get('/kasir', 'kasir')->name('kasir');
        // Route::get('/belumbayar', 'blmBayar')->name('belum.bayar');
        // Route::get('/selesai', 'selesai')->name('selesai.bayar');
        Route::get('/transaksi', 'transaksi')->name('transaksi');

    });
    Route::controller(LoginController::class)->group(function () {
        Route::get('/admin/Login', 'AdminLogin')->name('login.admin');
        Route::post('/admin/Login', 'Login')->defaults('role', 'Admin')->name('admin.login');

        // login kasir
        Route::get('/kasir/Login', 'kasirLogin')->name('kasir.login');
        Route::post('/kasir/Login', 'Login')->defaults('role', 'Kasir')->name('kasir.login');
        // register
        Route::get('/kasir/register', 'kasirregister')->name('kasir.register');
        Route::post('/kasir/register', 'register')->defaults('role', 'Kasir')->name('kasir.register');
        // end

        // login pembeli
        Route::get('/pembeli/Login', 'pembeliLogin')->name('pembeli.login');
        Route::post('/pembeli/Login', 'Login')->defaults('role', 'Pembeli')->name('pembeli.login');
        // register
        Route::get('/pembeli/register', 'pembeliregister')->name('pembeli.register');
        Route::post('/pembeli/register', 'register')->defaults('role', 'Pembeli')->name('pembeli.register');
        // end

        // log out
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(MenuController::class)->group(function () {
        // untuk tambah makanan
        Route::get('/tambah', 'tambah')->name('tambah');
        Route::post('/tambah', 'simpan')->name('simpan');
        Route::get('/daftar', 'index')->name('daftar.makanan');
        // end

        // untuk edit
        Route::get('/menu/edit/{id}','edit')->name('menu.edit');
        Route::post('/menu/update/{id}','update')->name('menu.update');
        //end

        //untuk delete
        Route::delete('/menu/delete/{id}', 'delete')->name('menu.delete');

        // untuk detail menu
        Route::get('/menu/detail/{id}','detail')->name('detail');
    });


    Route::controller(KategoriController::class)->group(function(){
        // menampilkan daftar kategroi
        Route::get('/Kategory', 'Kategory')->name('Kategory');
        // end
        // menampilkan form tambah kategori
        Route::get('/tambah/kategori', 'kategori')->name('kategori');
        // untuk menyimpan kategori
        Route::post('/tambah/kategori', 'simpanKategori')->name('simpan.kategori');
        // end
        Route::delete('/kategori/delete/{id}', 'delete')->name('kategori.delete');
    });

    Route::controller(StatistikController::class)->group(function(){
        // untuk dafatar penggunna
        // route ke halamana daftar pengguna
        Route::get('/pengguna','index')->name('pengguna');

        // route ke halaman editpengguna
        Route::get('/pengguna/edit/{id}', 'edit')->name('pengguna.edit');
        Route::put('/pengguna/update/{id}', 'update')->name('pengguna.update');
        Route::get('/pengguna/delete/{id}', 'delete')->name('pengguna.delete');
        // end daftar pengguna

        // untuk jumlah menu
        // route ke halaman jumlah menu
        Route::get('/jumlah/menu', 'jml_menu')->name('jumlah.menu');
        // end jumlah menu
    });

    Route::controller(PembeliController::class)->group(function(){
        // untuk proses pemesanan pda pembeli
        Route::get('/pesanan','pesanan')->name('pesanan');
        Route::get('/pesanan/riwayat','riwayat')->name('riwayat.pesanan');
        Route::post('/pesanan/konfirmasi/{order}','konfirmasi')->name('konfirmasi.pembeli');
        Route::post('/pesanan','bayar')->name('bayar');
        Route::delete('/pesanan/batal/{id}','batal')->name('pesanan.batal');
        // end
    });

    Route::controller(KasirController::class)->group(function(){
        // untuk proses konfirmasi pesanan pada kasir
        Route::get('/daftar-pesanan','daftar_pesanan')->name('daftar.pesanan');
        Route::post('/daftar-pesanan/konfirmasi/{order}','konfirmasi')->name('konfirmasi');
        Route::post('/daftar-pesanan/kirim/{order}','kirim')->name('kirim');
        // end
        Route::get('/daftar-pesanan/selesai','selesai')->name('selesai');
        Route::get('/belum-bayar','belum_bayar')->name('belum.bayar');
    });