<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_role')->insert([
            'role_id'     => 1,
            'module_id' => 1
        ]);

        DB::table('module_role')->insert([
            'role_id'     => 1,
            'module_id' => 2
        ]);

        DB::table('module_role')->insert([
            'role_id'     => 2,
            'module_id' => 2
        ]);

        DB::table('module_role')->insert([
            'role_id'     => 3,
            'module_id' => 3
        ]);

        DB::table('module_role')->insert([
            'role_id'     => 1,
            'module_id' => 4
        ]);

        DB::table('module_role')->insert([
            'role_id'     => 2,
            'module_id' => 4
        ]);
    }
}
