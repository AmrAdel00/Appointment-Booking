<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            'time' => '08.00 PM',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('times')->insert([
            'time' => '09.00 PM',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('times')->insert([
            'time' => '10.00 PM',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
