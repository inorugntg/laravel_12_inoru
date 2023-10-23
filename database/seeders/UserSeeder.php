<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin4321'),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user4321'),
            ],
            // Tambahkan data user atau admin lainnya jika diperlukan
        ];

        // Masukkan data user ke dalam tabel User
        DB::table('users')->insert($data);
    }
}
