<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '英語', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '中国語', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'フランス語', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ドイツ語', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'その他外国語', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '数学', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'プログラミング', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'デザイン', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ファッション', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '政治', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '投資', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ビジネス', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('categories')->insert($data);
    }
}
