<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('coaches')->insert([
            'license_plate' => '37a-1',
            'coach_maintenance_date' => '2025-06-06',
            'service' => 'Hàng hóa',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34',
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-2',
            'coach_maintenance_date' => '2025-06-06',
            'service' => 'Người',
            'vehicle_type' => 'vip',
            'sum_ticket' => '28'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-3',
            'coach_maintenance_date' => '2025-06-06',
            'service' => 'Người',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-4',
            'coach_maintenance_date' => '2025-06-06',
            'service' => 'Hàng hóa',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34',
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-5',
            'coach_maintenance_date' => '2024-10-06',
            'service' => 'Người',
            'vehicle_type' => 'vip',
            'sum_ticket' => '28'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-6',
            'coach_maintenance_date' => '2024-10-06',
            'service' => 'Người',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-7',
            'coach_maintenance_date' => '2024-11-06',
            'service' => 'Hàng hóa',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34',
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-8',
            'coach_maintenance_date' => '2024-11-06',
            'service' => 'Người',
            'vehicle_type' => 'vip',
            'sum_ticket' => '28'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37a-9',
            'coach_maintenance_date' => '2024-12-06',
            'service' => 'Người',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-1',
            'coach_maintenance_date' => '2024-12-06',
            'service' => 'Hàng hóa',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34',
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-2',
            'coach_maintenance_date' => '2024-12-06',
            'service' => 'Người',
            'vehicle_type' => 'vip',
            'sum_ticket' => '28'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-3',
            'coach_maintenance_date' => '2024-12-06',
            'service' => 'Người',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-4',
            'coach_maintenance_date' => '2024-12-06',
            'service' => 'Hàng hóa',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34',
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-5',
            'coach_maintenance_date' => '2024-12-06',
            'service' => 'Người',
            'vehicle_type' => 'vip',
            'sum_ticket' => '28'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-6',
            'coach_maintenance_date' => '2025-03-06',
            'service' => 'Người',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-7',
            'coach_maintenance_date' => '2025-03-06',
            'service' => 'Hàng hóa',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34',
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-8',
            'coach_maintenance_date' => '2025-04-06',
            'service' => 'Người',
            'vehicle_type' => 'vip',
            'sum_ticket' => '28'
        ]);
        DB::table('coaches')->insert([
            'license_plate' => '37b-9',
            'coach_maintenance_date' => '2025-04-06',
            'service' => 'Người',
            'vehicle_type' => 'Thường',
            'sum_ticket' => '34'
        ]);
    }
}
