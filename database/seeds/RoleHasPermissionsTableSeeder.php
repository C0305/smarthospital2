<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionsID = Array(
            1, 2, 3, 4,
            5, 6, 7, 8,
            9, 10, 11, 12,
            13, 14, 15, 16,
            17, 18, 19, 20,
            21, 22, 23, 24,
            25, 26, 27, 28,
            29, 30, 31, 32,
            33);
        $rolesId = array(1);
        foreach ($rolesId as $value){
            foreach ($permissionsID as $value2){
                DB::table('role_has_permissions')->insert(array(
                    'permission_id' => $value2,
                    'role_id' => $value
                ));
            }
            if($value === 1){
            DB::table('model_has_roles')->insert(array(
                'role_id' => 1,
                'model_type' => 'SmartHospital\User',
                'model_id' => 4
            ));
            }
        }
    }
}
