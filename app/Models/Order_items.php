<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $fillable = ['order_id', 'menu_id', 'quantity', 'subtotal'];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }
}
