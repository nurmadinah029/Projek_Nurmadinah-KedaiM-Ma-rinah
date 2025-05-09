<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'keterangan', 'harga', 'foto', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_menu');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_menu');
    }
}
