<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Buat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'username' => 'admin', // Sesuaikan dengan nama kolom yang ada di tabel
        ]);

        // Buat beberapa user lainnya
        User::create([
            'name' => 'User Satu',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
            'username' => 'user1', // Sesuaikan dengan nama kolom yang ada di tabel
        ]);

        User::create([
            'name' => 'User Dua',
            'email' => 'user2@example.com',
            'password' => bcrypt('password'),
            'username' => 'user2', // Sesuaikan dengan nama kolom yang ada di tabel
        ]);

        // Tambahkan lebih banyak data pengguna sesuai kebutuhan
    }
}
