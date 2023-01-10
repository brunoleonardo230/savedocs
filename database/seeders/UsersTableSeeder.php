<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'                => 1,
            'user_login'        => 'admin01',
            'type_user_id'      => 1,
            'name'              => 'Administrador_01',
            'cpf'               => NULL,
            'email'             => 'admin1@mail.com',
            'fantasy_name'      => NULL,
            'cnpj'              => NULL,
            'email_verified_at' => NULL,
            'password'          => Hash::make('savedocs'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 1,
            'representative_id' => NULL
        ]);

        DB::table('users')->insert([
            'id'                => 2,
            'user_login'        => 'tecnico01',
            'type_user_id'      => 1,
            'name'              => 'Tecnico_01',
            'cpf'               => NULL,
            'email'             => 'tecnico1@mail.com',
            'fantasy_name'      => NULL,
            'cnpj'              => NULL,
            'email_verified_at' => NULL,
            'password'          => Hash::make('savedocs'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 2,
            'representative_id' => NULL
        ]);

        DB::table('users')->insert([
            'id'                => 3,
            'user_login'        => 'cliente01',
            'type_user_id'      => 1,
            'name'              => 'Cliente_01',
            'cpf'               => NULL,
            'email'             => 'cliente1@mail.com',
            'fantasy_name'      => NULL,
            'cnpj'              => NULL,
            'email_verified_at' => NULL,
            'password'          => Hash::make('savedocs'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 3,
            'representative_id' => NULL
        ]);

        DB::table('users')->insert([
            'id'                => 4,
            'user_login'        => 'thiel.serra',
            'type_user_id'      => 1,
            'name'              => 'Thiel Serra',
            'cpf'               => NULL,
            'email'             => 'thiel.serra@gmail.com',
            'fantasy_name'      => NULL,
            'cnpj'              => NULL,
            'email_verified_at' => NULL,
            'password'          => Hash::make('savedocs'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 1,
            'representative_id' => NULL
        ]);

        DB::table('users')->insert([
            'id'                => 5,
            'user_login'        => 'bruno.silva',
            'type_user_id'      => 1,
            'name'              => 'Bruno Leonardo',
            'cpf'               => NULL,
            'email'             => 'bruno@mail.com',
            'fantasy_name'      => NULL,
            'cnpj'              => NULL,
            'email_verified_at' => NULL,
            'password'          => Hash::make('savedocs'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 1,
            'representative_id' => NULL
        ]);

        DB::table('users')->insert([
            'id'                => 6,
            'user_login'        => 'savedocs',
            'type_user_id'      => 2,
            'name'              => 'Savedocs',
            'cpf'               => NULL,
            'email'             => NULL,
            'fantasy_name'      => 'Save Docs',
            'cnpj'              => '99999999999999',
            'email_verified_at' => NULL,
            'password'          => Hash::make('savedocs'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 3,
            'representative_id' => 1
        ]);
    }
}
