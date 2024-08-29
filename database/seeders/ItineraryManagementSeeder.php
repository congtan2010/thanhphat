<?php

namespace Database\Seeders;

use App\Models\ItineraryManagement;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItineraryManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        ItineraryManagement::create([
            'start_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-6-27 21:40'),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-6-28 5:40'),
            'itineraries_id' => 1,
            'coaches_id' => 3,
            'price' => 350000,
        ]);
        ItineraryManagement::create([
            'start_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-6-28 21:40'),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-6-29 5:40'),
            'itineraries_id' => 2,
            'coaches_id' => 3,
            'price' => 250000,
        ]);
        ItineraryManagement::create([
            'start_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-6-26 21:40'),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-6-27 5:40'),
            'itineraries_id' => 1,
            'coaches_id' => 2,
            'price' => 250000,
        ]);
        ItineraryManagement::create([
            'start_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-7-27 21:40'),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-7-28 5:40'),
            'itineraries_id' => 3,
            'coaches_id' => 2,
            'price' => 250000,
        ]);
        ItineraryManagement::create([
            'start_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-8-15 21:40'),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-8-16 5:40'),
            'itineraries_id' => 2,
            'coaches_id' => 2,
            'price' => 200000,
        ]);
        ItineraryManagement::create([
            'start_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-8-29 21:40'),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i', '2024-8-30 5:40'),
            'itineraries_id' => 1,
            'coaches_id' => 1,
            'price' => 250000,
        ]);
    }
}
