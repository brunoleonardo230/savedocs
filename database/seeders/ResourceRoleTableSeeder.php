<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador | Usuários
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 1
        ]);

        // Administrador | Perfis
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 2
        ]);

        // Administrador | Permissões
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 3
        ]);

        // Administrador | Módulos
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 5
        ]);

        // Administrador | Chamados
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 4
        ]);

        // Técnico | Chamados
        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 4
        ]);

        // Cliente | Minha conta
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 8
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 9
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 10
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 11
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 12
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 13
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 14
        ]);
    }
}
