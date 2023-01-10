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

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 15
        ]);

        // Técnico | Chamados
        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 4
        ]);

        // Cliente | Chamados
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 4
        ]);

        // Administrador | Minha conta - INDEX
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 8
        ]);

        // Técnico | Minha conta - INDEX
        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 8
        ]);

        // Cliente | Minha conta - INDEX
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 8
        ]);

        // Administrador | Minha conta - UPDATE
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 9
        ]);

        // Técnico | Minha conta - UPDATE
        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 9
        ]);

        // Cliente | Minha conta - UPDATE
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 9
        ]);

        // Administrador | Dashboard
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 16
        ]);

        // Técnico | Dashboard
        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 16
        ]);

        // Cliente | Dashboard
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 16
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
            'resource_id' => 12
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 15
        ]);

        // Cliente | Minhas Solicitações - INDEX
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 15
        ]);

        // Administrador | Setor - INDEX
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 17
        ]);

         // Técnico | Setor - INDEX
         DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 17
        ]);

        // Administrador | Equipamentos - INDEX
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 18
        ]);

         // Técnico | Equipamentos - INDEX
         DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 18
        ]);

        // Técnico | Solicitações - EDIT
        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 14
        ]);

        // Técnico | Comentarios - STORE
        DB::table('resource_role')->insert([
            'role_id'     => 2,
            'resource_id' => 13
        ]);

        // Cliente | Solicitações - UPDATE
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 10
        ]);

        // Cliente | Solicitações - CREATE
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 11
        ]);

        // Cliente | Solicitações - STORE
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 12
        ]);

        // Cliente | Comentarios - STORE
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 13
        ]);

        // Cliente | Solicitações - EDIT
        DB::table('resource_role')->insert([
            'role_id'     => 3,
            'resource_id' => 14
        ]);
    }
}
