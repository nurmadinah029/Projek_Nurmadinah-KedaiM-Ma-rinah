<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'kasir', 'pembeli'])->default('pembeli');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('keterangan')->nullable();
            $table->integer('harga');
            $table->string('foto')->nullable();
            $table->foreignId('kategori_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('users')->onDelete('cascade');
            $table->timestamp('waktu_pesanan')->useCurrent();
            $table->timestamp('waktu_pengiriman')->nullable();
            $table->integer('total_harga');
            $table->enum('status', ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamps();
        });
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pesanan')->constrained('orders')->onDelete('cascade');
            $table->foreignId('id_menu')->constrained('menus')->onDelete('cascade');
            $table->integer('kuantitas');
            $table->integer('jumlah_keseluruhan');
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_menu')->constrained('menus')->onDelete('cascade');
            $table->tinyInteger('peringkat')->comment('1 sampai 5');
            $table->text('komentar')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users');
    }
};
