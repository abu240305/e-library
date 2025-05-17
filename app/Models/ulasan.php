<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'buku_id',
        'rating',
        'ulasan',
        'tanggal_ulasan',
    ];

     // Relasi dengan User, setiap ulasan dimiliki oleh seorang User
        public function user()
        {
            return $this->belongsTo('App\Models\User', 'user_id');
        }

     // Relasi dengan Buku, setiap ulasan terkait dengan sebuah Buku
        public function buku()
        {
            return $this->belongsTo('App\Models\Buku', 'buku_id');
        }
}
