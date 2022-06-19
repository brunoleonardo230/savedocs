<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'id'   => 1,
            'name' => 'Plano 1 Mensal',
            'url' => 'plano-1-mensal',
            'stripe_id' => 'price_1L21zHKMf06caMPMcP08qaAl',
            'price' => 37.0,
            'recomended' => 1,
            'description' => 'Plano 1 Mensal',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('plans')->insert([
            'id'   => 2,
            'name' => 'Plano 2 Mensal',
            'url' => 'plano-2-mensal',
            'stripe_id' => 'price_1L220lKMf06caMPMQekdwgi7',
            'price' => 57.0,
            'recomended' => 0,
            'description' => 'Plano 2 Mensal',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}
