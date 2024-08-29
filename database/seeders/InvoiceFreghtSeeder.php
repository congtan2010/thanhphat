<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceFreghtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invoice_freghts')->insert([
            'recipient_name' => 'Do Cong Tan',
            'recipient_address' => 'nghệ an',
            'weight' => '25kg',
            'recipient_phone_number' => '0987629877',
            'price' => 350000,
            'sender_name' => 'duong',
            'sender_phone_number' => '0777156017',
            'sender_address' => 'hà nội',
            'user_id' => 1

        ]);
    }
}
