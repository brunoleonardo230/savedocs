<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('category_service')->insert([
            'category_id'     => 1,
            'service_id' => 1
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 1,
            'service_id' => 2
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 1,
            'service_id' => 3
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 2,
            'service_id' => 4
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 2,
            'service_id' => 5
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 2,
            'service_id' => 6
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 3,
            'service_id' => 7
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 3,
            'service_id' => 8
        ]);
        DB::table('category_service')->insert([
            'category_id'     => 3,
            'service_id' => 9
        ]);

    }
}
