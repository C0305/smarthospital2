<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            
            ['name'=>'Piso 2',
                    'parent_id'=>null,
                    'hospital_id' => null,
                    'level' => 2,
                    'description', null],
            
            ['name'=>'Piso 3',
                    'parent_id'=>null,
                    'hospital_id' => null,
                    'level' => 3,
                    'description', null],
    
            ['name'=>'Quirofano 1',
                'parent_id'=>1,
                'hospital_id' => null,
                'level' => 1,
                'type' => 'Operations Room',
                'description', 'Maternidad'],
            
            ['name'=>'Quirofano 2',
                'parent_id'=>1,
                'hospital_id' => null,
                'level' => 1,
                'type' => 'Operations Room',
                'description', 'Maternidad'],
            
            ['name'=>'Quirofano 3',
                'parent_id'=>2,
                'hospital_id' => null,
                'level' => 2,
                'type' => 'Operations Room'],
            
            
        ];
        DB::table('settings_locations')->insert(
            ['name'=>'Piso 1',
            'level' => 1]);
    }
}
