<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seeder untuk karyawan
        $karyawanIds = [1, 2, 3, 4, 5]; // Sesuaikan dengan id karyawan yang telah Anda buat

        // Seeder untuk event dan event crews
        for ($i = 0; $i < 100; $i++) {
            $loadingDate = $faker->dateTimeBetween('2023-12-01', '2024-01-31')->format('Y-m-d');
            $startDate = $faker->dateTimeBetween($loadingDate, '2024-01-31')->format('Y-m-d');
            $endDate = $faker->dateTimeBetween($startDate, $startDate . '+2 days')->format('Y-m-d');

            $eventData = [
                'tanggal_loading' => $loadingDate,
                'tanggal_mulai' => $startDate,
                'tanggal_akhir' => $endDate,
                'ukuran_led' => $faker->randomNumber(2) . 'Meter ',
                'alat_tambahan' => $faker->word,
                'venue' => $faker->word,
                'note' => $faker->sentence,
                'status' => $faker->randomElement(['Pending', 'Approved']),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert event dan ambil ID
            $eventId = DB::table('events')->insertGetId($eventData);

            // Data event crew
            $eventCrewData = [
                'id_event' => $eventId,
                'id_karyawan' => $faker->randomElement($karyawanIds),
                'status_crew' => $faker->randomElement(['Crew', 'Operator', 'Crew + Operator']),
                'keterangan' => 'Keterangan ' . $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert event crew
            DB::table('event_crews')->insert($eventCrewData);
        }
    }
}


