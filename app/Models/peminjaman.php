<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'batas_pengembalian',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function buku(){
        return $this->belongsTo(Buku::class);
    }
    
    public function pengembalian(){
        return $this->hasOne(Pengembalian::class);
    }

    protected $casts = [
    'tanggal_pinjam' => 'date',
    'batas_pengembalian' => 'date',
    ];



}
