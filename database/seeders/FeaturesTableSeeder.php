<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            'id'   => 1,            
            'name' => 'DE 1 A 3 COMPUTADORES',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);        
        DB::table('features')->insert([
            'id'   => 2,            
            'name' => 'SUPORTE A 1 IMPRESSORA',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);       
        DB::table('features')->insert([
            'id'   => 3,            
            'name' => 'SUPORTE A REDE E INTERNET',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);        
        DB::table('features')->insert([
            'id'   => 4,            
            'name' => 'ATENDIMENTO REMOTO ILIMITADO',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 5,            
            'name' => 'CONSULTORIA ONLINE',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 6,            
            'name' => 'PLATAFORMA DE CHAMADOS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 7,            
            'name' => 'ACESSO AO PORTAL DE COMPRAS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 8,            
            'name' => 'DE 4 A 7 COMPUTADORES',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 9,            
            'name' => 'SUPORTE ATÉ 2 IMPRESSORAS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 10,            
            'name' => 'SUPORTE A BACKUP',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 11,            
            'name' => 'ATÉ 1 TREINAMENTO ONLINE / MÊS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 12,            
            'name' => 'ASSISTENTE TÉCNICO EM HARDWARE',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 13,            
            'name' => 'DE 8 A 10 COMPUTADORES',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 14,            
            'name' => 'SUPORTE ATÉ 3 IMPRESSORAS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 15,            
            'name' => 'SUPORTE A SERVIDOR',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 16,            
            'name' => 'SUPORTE A FIREWALL',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 17,            
            'name' => 'RECUPERAÇÃO DE DADOS VIA SOFTWARE',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 18,            
            'name' => 'SUPORTE A 1 COMPUTADOR',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 19,            
            'name' => '4 CHAMADOS REMOTOS MENSAIS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 20,            
            'name' => 'SUPORTE A 2 COMPUTADORES',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 21,            
            'name' => '8 CHAMADOS REMOTOS MENSAIS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 22,            
            'name' => 'ASSISTÊNCIA TÉCNICA EM HARDWARE',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 23,            
            'name' => '50% DE DESCONTO REC. DE DADOS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 24,            
            'name' => 'SUPORTE A 3 COMPUTADORES',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 25,            
            'name' => '12 CHAMADOS REMOTOS MENSAIS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 26,            
            'name' => 'RECUPERAÇÃO DE DADOS VIA SOFTWARE',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
