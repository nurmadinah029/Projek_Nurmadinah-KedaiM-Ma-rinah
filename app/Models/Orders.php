<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $casts = [
        'order_time' => 'datetime',
        'delivery_time' => 'datetime',
    ];
    
    protected $fillable = ['user_id', 'order_time', 'delivery_time', 'total_price', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function items()
    {
        return $this->hasMany(Order_items::class,'order_id');
    }
}
