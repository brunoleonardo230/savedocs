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
            'name' => 'Listar usuários',
            'resource' => 'users.index',
            'is_menu' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 2,
            'name' => 'Adicionar usuário',
            'resource' => 'users.create',
            'is_menu' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 3,
            'name' => 'Editar usuário',
            'resource' => 'users.edit',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 4,
            'name' => 'Salvar usuário',
            'resource' => 'users.store',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('resources')->insert([
            'id'   => 5,
            'name' => 'Atualizar usuário',
            'resource' => 'users.update',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 6,
            'name' => 'Remover usuário',
            'resource' => 'users.destroy',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
            
        // Roles ---------------------------

        DB::table('resources')->insert([
            'id'   => 7,
            'name' => 'Listar perfis',
            'resource' => 'roles.index',
            'is_menu' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 8,
            'name' => 'Adicionar perfil',
            'resource' => 'roles.create',
            'is_menu' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 9,
            'name' => 'Editar perfil',
            'resource' => 'roles.edit',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 10,
            'name' => 'Salvar perfil',
            'resource' => 'roles.store',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('resources')->insert([
            'id'   => 11,
            'name' => 'Atualizar perfil',
            'resource' => 'roles.update',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 12,
            'name' => 'Remover perfil',
            'resource' => 'roles.destroy',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 13,
            'name' => 'Permissões',
            'resource' => 'roles.resources',
            'is_menu' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 14,
            'name' => 'Atualizar permissões',
            'resource' => 'roles.resources.update',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Resources -------------------------

        DB::table('resources')->insert([
            'id'   => 15,
            'name' => 'Listar Permissões',
            'resource' => 'resources.index',
            'is_menu' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 16,
            'name' => 'Adicionar permissão',
            'resource' => 'resources.create',
            'is_menu' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 17,
            'name' => 'Editar permissão',
            'resource' => 'resources.edit',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 18,
            'name' => 'Salvar permissão',
            'resource' => 'resources.store',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('resources')->insert([
            'id'   => 19,
            'name' => 'Atualizar permissão',
            'resource' => 'resources.update',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('resources')->insert([
            'id'   => 20,
            'name' => 'Remover permissão',
            'resource' => 'resources.destroy',
            'is_menu' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}