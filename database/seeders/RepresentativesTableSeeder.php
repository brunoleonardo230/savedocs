<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RepresentativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('representatives')->insert([
            'id'                => 1,
            'name'              => 'Representante_01',
            'cpf'               => '12312312312',
            'email'             => 'representante1@mail.com',
            'phone'             => '99999999999'
        ]);

    }
}
