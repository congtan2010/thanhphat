<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('tickets')->insert([
            'seat_position' => 'A1',
            'userName' => 'Duong',
            'user_id' => 5,
            'phoneNumber' => 941042988,
            'coaches_id' => 1,
            'status' => 'pay',
            'itinerary_management_id' => 5,
            'created_at' => '2024-06-27 06:22:2',
            'updated_at' => '2024-06-27 06:22:2',

        ]);
        DB::table('tickets')->insert([
            'seat_position' => 'A2',
            'userName' => 'dat',
            'user_id' => 1,
            'phoneNumber' => 941042978,
            'coaches_id' => 2,
            'itinerary_management_id' => 2,
            'created_at' => '2024-07-27 06:22:2',
            'updated_at' => '2024-07-27 06:22:2',

        ]);
        DB::table('tickets')->insert([
            'seat_position' => 'A1',
            'userName' => 'dai',
            'user_id' => 2,
            'phoneNumber' => 941042958,
            'coaches_id' => 3,
            'status' => 'pay',
            'itinerary_management_id' => 5,
            'created_at' => '2024-05-27 06:22:2',
            'updated_at' => '2024-05-27 06:22:2',

        ]);
    }
}
