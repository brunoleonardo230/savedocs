<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquipamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipaments')->insert([
            'id'   => 1,
            'name' => 'Notebook-Teste',
            'equipment_type' => 2,
            'identification_code' => '34-FF-8F-FA-9E-70',
            'description' => '',
            'user_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('equipaments')->insert([
            'id'   => 2,
            'name' => 'Impressora-Cliente01',
            'equipment_type' => 1,
            'identification_code' => '53-C1-6F-95-51-12',
            'description' => '',
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('equipaments')->insert([
            'id'   => 3,
            'name' => 'Notebook-Other',
            'equipment_type' => 2,
            'identification_code' => '34-FF-8F-FA-9E-70',
            'description' => '',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('equipaments')->insert([
            'id'   => 4,
            'name' => 'Impressora-Cliente01',
            'equipment_type' => 1,
            'identification_code' => '53-C1-6F-95-51-12',
            'description' => '',
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('equipaments')->insert([
            'id'   => 5,
            'name' => 'Impressora-Teste',
            'equipment_type' => 1,
            'identification_code' => '53-C1-6F-95-51-12',
            'description' => '',
            'user_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('equipaments')->insert([
            'id'   => 6,
            'name' => 'Notebook-Cliente01',
            'equipment_type' => 2,
            'identification_code' => '34-FF-8F-FA-9E-70',
            'description' => '',
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        

    }
}