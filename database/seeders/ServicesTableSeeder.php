<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'id'   => 1,
            'name' => 'INTERNET - Liberar site bloqueado',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 2,
            'name' => 'INTERNET - Internet lenta',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 3,
            'name' => 'INTERNET - Sem acesso a internet',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 4,
            'name' => 'REDE - Lentidão na rede',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 5,
            'name' => 'REDE - Computador não conecta a rede o internet',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 6,
            'name' => 'REDE - Crimpagem conector macho - RJ45',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 7,
            'name' => 'EMAIL - Liberar email no antispam',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 8,
            'name' => 'EMAIL - Reset de senha',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('services')->insert([
            'id'   => 9,
            'name' => 'EMAIL - Backup ou exclusão de e-mails',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
  
    }
}