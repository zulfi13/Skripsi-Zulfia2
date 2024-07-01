<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'username' => 'admin',
            ],
            [
                'name' => 'User Satu',
                'email' => 'user1@example.com',
                'password' => bcrypt('password'),
                'username' => 'user1',
            ],
            [
                'name' => 'User Dua',
                'email' => 'user2@example.com',
                'password' => bcrypt('password'),
                'username' => 'user2',
            ]
        ]);
    }
}
