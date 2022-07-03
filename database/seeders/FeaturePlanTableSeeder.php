<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeaturePlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('feature_plan')->insert([
            'plan_id'     => 1,
            'feature_id' => 1
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 1,
            'feature_id' => 2
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 1,
            'feature_id' => 3
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 2,
            'feature_id' => 1
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 2,
            'feature_id' => 2
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 2,
            'feature_id' => 3
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 2,
            'feature_id' => 4
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 2,
            'feature_id' => 5
        ]);
        DB::table('feature_plan')->insert([
            'plan_id'     => 2,
            'feature_id' => 6
        ]);

    }
}
