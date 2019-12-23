<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['value' => 15, 'time' => '15分', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 30, 'time' => '30分', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 60, 'time' => '1時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 90, 'time' => '1時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 120, 'time' => '2時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 150, 'time' => '2時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 180, 'time' => '3時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 210, 'time' => '3時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 240, 'time' => '4時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 270, 'time' => '4時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 300, 'time' => '5時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 330, 'time' => '5時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 360, 'time' => '6時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 390, 'time' => '6時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 420, 'time' => '7時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 450, 'time' => '7時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 480, 'time' => '8時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 510, 'time' => '8時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 540, 'time' => '9時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 570, 'time' => '9時間半', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['value' => 600, 'time' => '10時間', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('times')->insert($data);
    }
}
