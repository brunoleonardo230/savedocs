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
        // Administrador | Lista usuários
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 1
        ]);

        // Administrador | Criar usuários
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 2
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 3
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 4
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 5
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 6
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 7
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 8
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 9
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 10
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 11
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 12
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 13
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 14
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 15
        ]);
        
        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 16
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 17
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 18
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 19
        ]);

        DB::table('resource_role')->insert([
            'role_id'     => 1,
            'resource_id' => 20
        ]);
    }
}
