<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['id_pengguna', 'id_menu', 'peringkat', 'komentar'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
