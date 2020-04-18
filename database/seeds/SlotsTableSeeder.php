<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slots')->insert([
            [
                'name'=>null,
                'no'=>'2',
                'startTime'=>'090000',
                'endTime'=>'180000',
                'day_id'=>'1',
                'duration'=>'30',
            ],
            [
                'name'=>null,
                'no'=>'2',
                'startTime'=>'090000',
                'endTime'=>'180000',
                'day_id'=>'2',
                'duration'=>'30',
            ],
            [
                'name'=>null,
                'no'=>'2',
                'startTime'=>'090000',
                'endTime'=>'180000',
                'day_id'=>'3',
                'duration'=>'30',
            ],
            [
                'name'=>null,
                'no'=>'2',
                'startTime'=>'090000',
                'endTime'=>'180000',
                'day_id'=>'4',
                'duration'=>'30',
            ],
            [
                'name'=>null,
                'no'=>'2',
                'startTime'=>'090000',
                'endTime'=>'180000',
                'day_id'=>'5',
                'duration'=>'30',
            ],
            [
                'name'=>null,
                'no'=>'4',
                'startTime'=>'090000',
                'endTime'=>'180000',
                'day_id'=>'6',
                'duration'=>'30',
            ]
        ]);
    }
}
