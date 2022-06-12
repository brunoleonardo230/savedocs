<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        // Users  ---------------------------
        
        DB::table('resources')->insert([
            'id'   => 1,
            'name' => 'Usuários',
            'resource' => 'users.index',
            'is_menu' => true,
            'icon'  => 'fa-solid fa-users',
            'module_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
            
        // Roles ---------------------------

        DB::table('resources')->insert([
            'id'   => 2,
            'name' => 'Perfis',
            'resource' => 'roles.index',
            'is_menu' => true,
            'icon'  => 'fa-solid fa-id-badge',
            'module_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Resources ------------------------

        DB::table('resources')->insert([
            'id'   => 3,
            'name' => 'Permissões',
            'resource' => 'resources.index',
            'is_menu' => true,
            'icon'  => 'fa-solid fa-list-check',
            'module_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Callers ------------------------

        DB::table('resources')->insert([
            'id'   => 4,
            'name' => 'Chamados',
            'resource' => 'callers.index',
            'is_menu' => true,
            'icon'  => 'fa-solid fa-headset',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}