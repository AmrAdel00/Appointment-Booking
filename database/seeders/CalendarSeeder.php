<?php

namespace Database\Seeders;

use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dates = CarbonPeriod::create('2021-01-01', '2023-12-31');
        foreach ($dates as $date) {
            DB::table('calendars')->insert([
                'date' => $date->format('Y-m-d'),
                'day_name' => $date->format('D'),
                'day' => $date->day,
                'month' => $date->month,
                'year' => $date->year,
            ]);
        }
    }
}
