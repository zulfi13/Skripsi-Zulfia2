<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class IncomingCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incoming_capacities')->insert([
            [
                'total_kapasitas' => 100000000,
                'total_terpakai' => 0,
                'sisa_kapasitas' => 0
            ]
        ]);
    }
}
