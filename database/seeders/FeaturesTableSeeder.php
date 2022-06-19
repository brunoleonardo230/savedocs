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
            'name' => 'CONSULTORIA DE TI PARA SUA CASA',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);        
        DB::table('features')->insert([
            'id'   => 2,            
            'name' => 'FORMATAÇÃO DE DESKTOPS E NOTEBOOK',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);       
        DB::table('features')->insert([
            'id'   => 3,            
            'name' => 'INSTALAÇÃO DE SISTEMAS OPERACIONAIS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);        
        DB::table('features')->insert([
            'id'   => 4,            
            'name' => 'INSTALAÇÃO E MANUTENÇÃO DE HARDWARE E SOFTWARE',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 5,            
            'name' => 'LIMPEZA E REMOÇÃO DE VÍRUS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('features')->insert([
            'id'   => 6,            
            'name' => 'CONFIGURAÇÃO DE ROTEADORES E IMPRESSORAS',            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
