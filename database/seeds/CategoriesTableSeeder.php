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
            ['name' => '言語', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '数学', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '化学', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '経済', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '歴史', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'プログラミング', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '政治', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '投資', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ビジネス', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '心理学', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'デザイン', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'その他', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('categories')->insert($data);
    }
}
