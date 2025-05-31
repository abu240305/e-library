<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $kategoriList = ['Novel', 'Ilmiah', 'Sejarah', 'Edukasi', 'Fiksi'];

        for ($i = 0; $i < 10; $i++) {
            Buku::create([
                'judul' => $faker->sentence(3),
                'penulis' => $faker->name,
                'penerbit' => $faker->company,
                'tanggal_terbit' => $faker->date(),
                'kategori' => $faker->randomElement($kategoriList),
                'deskripsi' => $faker->paragraph,
                'cover' => 'edtzbmtTzEoHAD5eUgj909pVYtvrBJQfwZsrXfWf.jpg', // path dummy
                'stok_buku' => $faker->numberBetween(1, 20),
                'buku' => '6WKs0zUK8IadzxpG0n0xNJ8c7NP307y9KYUb14uQ.pdf', // path dummy
            ]);
        }
    }
}
