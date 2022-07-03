<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlanServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('plan_service')->insert([
            'plan_id'     => 1,
            'service_id' => 1
        ]);
        DB::table('plan_service')->insert([
            'plan_id'     => 1,
            'service_id' => 2
        ]);
        DB::table('plan_service')->insert([
            'plan_id'     => 1,
            'service_id' => 3
        ]);
        DB::table('plan_service')->insert([
            'plan_id'     => 2,
            'service_id' => 4
        ]);
        DB::table('plan_service')->insert([
            'plan_id'     => 2,
            'service_id' => 5
        ]);
        DB::table('plan_service')->insert([
            'plan_id'     => 2,
            'service_id' => 6
        ]);        

    }
}
