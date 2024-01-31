<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawans')->insert([
            [
                'nama' => 'Dek Wik',
                'alamat' => 'Pecatu, Jimbaran',
                'nomer_hp' => '085338826287',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Maman',
                'alamat' => 'Jimbaran',
                'nomer_hp' => '085338826287',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Doweh',
                'alamat' => 'Jimbaran',
                'nomer_hp' => '085338826287',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Abdul',
                'alamat' => 'Nusa Dua',
                'nomer_hp' => '085338826287',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Yoga',
                'alamat' => 'Sakah, Sukawati, Gianyar',
                'nomer_hp' => '0895342581529',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
