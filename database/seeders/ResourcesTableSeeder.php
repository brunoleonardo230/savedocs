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
            'icon'  => 'fas fa-fw fa-users',
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
            'icon'  => 'fas fa-fw fa-id-badge',
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
            'icon'  => 'fas fa-fw fa-list',
            'module_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        // Tickets ------------------------

        DB::table('resources')->insert([
            'id'   => 4,
            'name' => 'Tickets',
            'resource' => 'tickets.index',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-headset',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Modules ------------------------

        DB::table('resources')->insert([
            'id'   => 5,
            'name' => 'Módulos',
            'resource' => 'modules.index',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-check',
            'module_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Plans ------------------------

        DB::table('resources')->insert([
            'id'   => 6,
            'name' => 'Planos',
            'resource' => 'plans.index',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-check',
            'module_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}