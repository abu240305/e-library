<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nama'=>'AkunAdmin',
                'no_hp'=>'08123456789',
                'alamat'=>'Jl. Admin No. 1',
                'jenis_kelamin'=>'L',
                'tanggal_lahir'=>'2000-01-01',
                'asal'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>Hash::make('123456')
            ],
            
            [
                'nama'=>'AkunUser1',
                'no_hp'=>'08123456111',
                'alamat'=>'Jl. User1 No. 1',
                'jenis_kelamin'=>'P',
                'tanggal_lahir'=>'2000-01-01',
                'asal'=>'User1',
                'email'=>'user1@gmail.com',
                'role'=>'user',
                'password'=>Hash::make('123456')
            ],
            [
                'nama'=>'AkunUser2',
                'no_hp'=>'08123456112',
                'alamat'=>'Jl. User2 No. 1',
                'jenis_kelamin'=>'L',
                'tanggal_lahir'=>'2000-01-01',
                'asal'=>'User2',
                'email'=>'user2@gmail.com',
                'role'=>'user',
                'password'=>Hash::make('123456')
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
