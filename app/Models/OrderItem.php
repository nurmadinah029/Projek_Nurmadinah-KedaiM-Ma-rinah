<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['id_pesanan', 'id_menu', 'kuantitas', 'jumlah_keseluruhan'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_pesanan');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
