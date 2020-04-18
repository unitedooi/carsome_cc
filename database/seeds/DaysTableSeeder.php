<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            [
                'name' => 'Monday',
                'type' => 'Weekday'
            ],
            [
                'name' => 'Tuesday',
                'type' => 'Weekday'
            ],
            [
                'name' => 'Wednesday',
                'type' => 'Weekday'
            ],
            [
                'name' => 'Thursday',
                'type' => 'Weekday'
            ],
            [
                'name' => 'Friday',
                'type' => 'Weekday'
            ],
            [
                'name' => 'Saturday',
                'type' => 'Weekend'
            ],
            [
                'name' => 'Sunday',
                'type' => 'Weekend'
            ],
        ]);
    }
}
