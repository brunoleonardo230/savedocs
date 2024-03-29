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
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'ordination' => 1
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
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'ordination' => 5
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
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'ordination' => 4
        ]);


        // Tickets ------------------------

        DB::table('resources')->insert([
            'id'   => 4,
            'name' => 'Solicitações',
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
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'ordination' => 3
        ]);

        // Plans ------------------------

        DB::table('resources')->insert([
            'id'   => 6,
            'name' => 'Planos',
            'resource' => 'plans.index',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-file',
            'module_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Status ------------------------

        DB::table('resources')->insert([
            'id'   => 7,
            'name' => 'Status',
            'resource' => 'statuses.index',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-circle',
            'module_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Account ------------------------

        DB::table('resources')->insert([
            'id'   => 8,
            'name' => 'Minha conta',
            'resource' => 'accounts.show',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-user',
            'module_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 9,
            'name' => 'Minha conta',
            'resource' => 'accounts.update',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-user',
            'module_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 10,
            'name' => 'Solicitações-Update',
            'resource' => 'tickets.update',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-headset',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 11,
            'name' => 'Solicitações-Create',
            'resource' => 'tickets.create',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-headset',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 12,
            'name' => 'Solicitações-Store',
            'resource' => 'tickets.store',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-headset',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 13,
            'name' => 'Comentários-Store',
            'resource' => 'comments.store',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-headset',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 14,
            'name' => 'Solicitações-Edit',
            'resource' => 'tickets.edit',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-headset',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 15,
            'name' => 'Minhas Solicitações',
            'resource' => 'tickets.ticketsopen',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-desktop',
            'module_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Dashboard ------------------------

        DB::table('resources')->insert([
            'id'   => 16,
            'name' => 'Dashboard',
            'resource' => 'dashboard',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-user',
            'module_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Parâmetros ------------------------

        DB::table('resources')->insert([
            'id'   => 17,
            'name' => 'Setor',
            'resource' => 'sector.index',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-cogs',
            'module_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
        
        DB::table('resources')->insert([
            'id'   => 18,
            'name' => 'Equipamentos',
            'resource' => 'equipaments.index',
            'is_menu' => true,
            'icon'  => 'fas fa-fw fa-desktop',
            'module_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'ordination' => 2
        ]); 

        DB::table('resources')->insert([
            'id'   => 19,
            'name' => 'Alterar Senha',
            'resource' => 'accounts.access.update',
            'is_menu' => false,
            'icon'  => 'fas fa-fw fa-page',
            'module_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

    }
}