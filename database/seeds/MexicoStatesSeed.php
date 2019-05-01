<?php

use Illuminate\Database\Seeder;

class MexicoStatesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
    public function run()
    {
        
        $mexicoStates = [
                array('federal_entity' => 'Aguascalientes','abbreviation' => 'AGS.'),
                array('federal_entity' => 'Baja California','abbreviation' => 'B. C.'),
                array('federal_entity' => 'Baja California Sur','abbreviation' => 'B. C. S.'),
                array('federal_entity' => 'Campeche','abbreviation' => 'Camp.'),
                array('federal_entity' => 'Chiapas','abbreviation' => 'Chis.'),
                array('federal_entity' => 'Chihuahua','abbreviation' => 'Chih.'),
                array('federal_entity' => 'Ciudad de México','abbreviation' => 'CDMX.'),
                array('federal_entity' => 'Coahuila de Zaragoza','abbreviation' => 'Coah.'),
                array('federal_entity' => 'Colima','abbreviation' => 'Col.'),
                array('federal_entity' => 'Durango','abbreviation' => 'Dgo.'),
                array('federal_entity' => 'Guanajuato','abbreviation' => 'Gto.'),
                array('federal_entity' => 'Guerrero','abbreviation' => 'Gro.'),
                array('federal_entity' => 'Hidalgo','abbreviation' => 'Hgo.'),
                array('federal_entity' => 'Jalisco','abbreviation' => 'Jal.'),
                array('federal_entity' => 'México','abbreviation' => 'Méx.'),
                array('federal_entity' => 'Michoacán de Ocampo','abbreviation' => 'Mich.'),
                array('federal_entity' => 'Morelos','abbreviation' => 'Mor.'),
                array('federal_entity' => 'Nayarit','abbreviation' => 'Nay.'),
                array('federal_entity' => 'Nuevo León','abbreviation' => 'N. L.'),
                array('federal_entity' => 'Oaxaca','abbreviation' => 'Oax.'),
                array('federal_entity' => 'Puebla','abbreviation' => 'Pue.'),
                array('federal_entity' => 'Querétaro de Arteaga','abbreviation' => 'Qro.'),
                array('federal_entity' => 'Quintana Roo','abbreviation' => 'Q. R.'),
                array('federal_entity' => 'San Luis Potosí','abbreviation' => 'S. L. P.'),
                array('federal_entity' => 'Sinaloa','abbreviation' => 'Sin.'),
                array('federal_entity' => 'Sonora','abbreviation' => 'Son.'),
                array('federal_entity' => 'Tabasco','abbreviation' => 'Tab.'),
                array('federal_entity' => 'Tamaulipas','abbreviation' => 'Tamps.'),
                array('federal_entity' => 'Tlaxcala','abbreviation' => 'Tlax.'),
                array('federal_entity' => 'Veracruz de Ignacio de la Llave','abbreviation' => 'Ver.'),
                array('federal_entity' => 'Yucatán','abbreviation' => 'Yuc.'),
                array('federal_entity' => 'Zacatecas','abbreviation' => 'Zac.'),
            ];
        
         foreach($mexicoStates as $state){
             DB::table('general_mexico_states')->insert($state);
         }
    }
}
