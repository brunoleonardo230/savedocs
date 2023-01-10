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
            'name' => 'PF - PLANO A',
            'url' => 'pf-plano-a',
            'stripe_id' => 'price_1LXZ7TAeOcvnEld9G1XxQldp',
            'price' => 39.9,
            'ticket_remote' => 4,
            'ticket_in_person' => 0,
            'recomended' => 0,
            'description' => 'PF - PLANO A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('plans')->insert([
            'id'   => 2,
            'name' => 'PF - PLANO B',
            'url' => 'pf-plano-b',
            'stripe_id' => 'price_1LXZ8FAeOcvnEld9M7HggeDQ',
            'price' => 59.9,
            'ticket_remote' => 8,
            'ticket_in_person' => 0,
            'recomended' => 1,
            'description' => 'PF - PLANO B',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('plans')->insert([
            'id'   => 3,
            'name' => 'PF - PLANO C',
            'url' => 'pf-plano-c',
            'stripe_id' => 'price_1LXZ8jAeOcvnEld9KZZBVF5g',
            'price' => 79.9,
            'ticket_remote' => 12,
            'ticket_in_person' => 0,
            'recomended' => 0,
            'description' => 'PF - PLANO C',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('plans')->insert([
            'id'   => 4,
            'name' => 'PJ - PLANO A',
            'url' => 'pj-plano-a',
            'stripe_id' => 'price_1LXZ9lAeOcvnEld9fAfkwy0T',
            'price' => 330.0,
            'ticket_remote' => 0,
            'ticket_in_person' => 0,
            'recomended' => 0,
            'description' => 'PJ - PLANO A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('plans')->insert([
            'id'   => 5,
            'name' => 'PJ - PLANO B',
            'url' => 'pj-plano-b',
            'stripe_id' => 'price_1LXZADAeOcvnEld9YuoJyEi9',
            'price' => 640.0,
            'ticket_remote' => 0,
            'ticket_in_person' => 0,
            'recomended' => 0,
            'description' => 'PJ - PLANO B',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('plans')->insert([
            'id'   => 6,
            'name' => 'PJ - PLANO C',
            'url' => 'pj-plano-c',
            'stripe_id' => 'price_1LXZAcAeOcvnEld9dPy0Wruj',
            'price' => 1120.0,
            'ticket_remote' => 0,
            'ticket_in_person' => 0,
            'recomended' => 0,
            'description' => 'PJ - PLANO C',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}
