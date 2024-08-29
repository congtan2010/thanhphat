<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            'fullname' => ' Tan',
            'phone_number' => '0987629877',
            'password' => bcrypt('282012'),
        ]);
        // $faker = Factory::create();

        // $limit = 10;

        // for ($i = 0; $i < $limit; $i++) {
        //     DB::table('staff')->insert([
        //         'fullname' => $faker->name,
        //         'phone_number' => $faker->randomNumber(9, true),
        //         'password' => $faker->unique()->password,
        //     ]);
        // };

    }
}
