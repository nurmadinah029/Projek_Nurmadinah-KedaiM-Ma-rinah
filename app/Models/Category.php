<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id_pengguna', 'waktu_pesanan', 'waktu_pengiriman', 'total_harga', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_pesanan');
    }
}
