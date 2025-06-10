<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'description', 'price', 'photo', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(Order_items::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
