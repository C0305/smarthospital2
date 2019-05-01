<?php

use Illuminate\Database\Seeder;

class DemoPatients extends Seeder
{
    /*
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = [array(
            'name' => 'Paola',
            'last_name' => 'H',
            'mother_last_name' => 'Nuñez',
            'gender' => 'Femenino',
            'birthday' => '1997-01-27 00:00:00',
            'email' => 'paohn@gmail.com',
            'marital_status' => 'Soltero',
            'blood_group' => 'A+'
        ),];

        foreach($patients as $patient){
            $model = new \SmartHospital\Models\ElectronicHealthRecord\Patient\Patient($patient);
            $model->save();
        }
    }
}
