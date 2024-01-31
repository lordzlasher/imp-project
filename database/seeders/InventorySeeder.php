<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventories')->insert([
            [
                'nama' => 'Stand',
                'satuan' => 'pcs',
                'jumlah' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Baut',
                'satuan' => 'Pcs',
                'jumlah' => '500',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Klem',
                'satuan' => 'Pcs',
                'jumlah' => '100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Stand',
                'satuan' => 'Pcs',
                'jumlah' => '200',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'LED',
                'satuan' => 'Cabinet',
                'jumlah' => '250',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
