<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class AutoPengembalian extends Command
{
    protected $signature = 'pengembalian:otomatis';
    protected $description = 'Membuat pengembalian otomatis untuk peminjaman yang melewati batas pengembalian';

    public function handle()
    {
        $peminjamans = Peminjaman::whereColumn('batas_pengembalian', '<=', 'tanggal_pinjam')
            ->whereDoesntHave('pengembalian')
            ->with('buku')
            ->get();

        foreach ($peminjamans as $pinjam) {
            Pengembalian::create([
                'peminjaman_id' => $pinjam->id,
                'user_id' => $pinjam->user_id,
                'tanggal_kembali' => now(),
            ]);

            if ($pinjam->buku) {
                $pinjam->buku->increment('stok_buku');
            }
        }

        $this->info('Pengembalian otomatis berhasil diproses.');
    }
}
