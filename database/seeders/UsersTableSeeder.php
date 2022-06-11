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
            'name'              => 'Administrador_01',
            'email'             => 'admin1@mail.com',
            'email_verified_at' => NULL,
            'password'          => Hash::make('12345678'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 1
        ]);

        DB::table('users')->insert([
            'id'                => 2,
            'name'              => 'Tecnico_01',
            'email'             => 'tecnico1@mail.com',
            'email_verified_at' => NULL,
            'password'          => Hash::make('12345678'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 2
        ]);

        DB::table('users')->insert([
            'id'                => 3,
            'name'              => 'Cliente_01',
            'email'             => 'cliente1@mail.com',
            'email_verified_at' => NULL,
            'password'          => Hash::make('12345678'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 3
        ]);

        DB::table('users')->insert([
            'id'                => 4,
            'name'              => 'Thiel Serra',
            'email'             => 'thiel.serra@gmail.com',
            'email_verified_at' => NULL,
            'password'          => Hash::make('12345678'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 1
        ]);

        DB::table('users')->insert([
            'id'                => 5,
            'name'              => 'Bruno Leonardo',
            'email'             => 'bruno@mail.com',
            'email_verified_at' => NULL,
            'password'          => Hash::make('12345678'),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'stripe_id'         => NULL,
            'pm_type'           => NULL,
            'pm_last_four'      => NULL,
            'trial_ends_at'     => NULL,
            'role_id'           => 1
        ]);
    }
}
