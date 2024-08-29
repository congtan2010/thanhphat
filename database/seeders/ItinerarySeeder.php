<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItinerarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('itineraries')->insert([
            'starting_poin' => 'Hà Nội',
            'destination' => 'Thanh Hóa',
        ]);
        DB::table('itineraries')->insert([
            'starting_poin' => 'Hà Nội',
            'destination' => 'Nghệ An',
        ]);
        DB::table('itineraries')->insert([
            'starting_poin' => 'Nghệ An',
            'destination' => 'Hà Nội',
        ]);
        DB::table('itineraries')->insert([
            'starting_poin' => 'Nghệ An',
            'destination' => 'Thanh Hóa',
        ]);
        DB::table('itineraries')->insert([
            'starting_poin' => 'Thanh Hóa',
            'destination' => 'Hà Nội',
        ]);
        DB::table('itineraries')->insert([
            'starting_poin' => 'Thanh Hóa',
            'destination' => 'Nghệ An',
        ]);
    }
}
