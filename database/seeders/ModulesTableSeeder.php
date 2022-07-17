<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'id'   => 1,
            'name' => 'Cadastro',
            'icon' => 'fas fa-fw fa-address-card',
            'is_active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
        
        DB::table('modules')->insert([
            'id'   => 2,
            'name' => 'Atividade',
            'icon' => 'fas fa-fw fa-chart-line',
            'is_active' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('modules')->insert([
            'id'   => 3,
            'name' => 'Invisível',
            'icon' => 'fas fa-fw fa-chart-line',
            'is_active' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
