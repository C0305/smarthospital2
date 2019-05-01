<?php

use Illuminate\Database\Seeder;

class ProceduresTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proceduresTypes = [
            array(  'name' => 'Tococirugía',
                    'description' => 'Área quirúrgica destinada para realizar procedimientos Gineco-Obstétricos.', 
                    'pre_recommendations'=> ''),
            array(  'name' => 'Endoscopia',
                    'description' => 'Procedimiento que permite que el médico vea el interior de su cuerpo. Utiliza un instrumento llamado endoscopio o tubo visor.', 
                    'pre_recommendations'=> ''),
            array(  'name' => 'Ambulatoria',
                    'description' => 'Ambulatoria o de corta estancia son intervenciones quirúrgicas para las cuales es necesario permanecer en el hospital un período de 4 a 6 horas.', 
                    'pre_recommendations'=> ''),
            ];
        foreach ($proceduresTypes as $type) {
            DB::table('operating_theater_procedures_types')->insert($type);
        }
    }
}
