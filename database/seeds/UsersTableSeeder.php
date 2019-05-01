<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = array(
            array(
                'name' => 'demo',
                'email' => 'demo@smarthospital.tech',
                'password' => bcrypt('frank123#1221#'),
            ),
                array(
                    'name' => 'Eric',
                    'email' => 'eric@smarthospital.tech',
                    'password' =>  bcrypt('eric123#1221#'),
                ),
                array(
                    'name' => 'Martha',
                    'email' => 'rmorales@smarthospital.tech',
                    'password' =>  bcrypt('rmorales#1221#'),
                ),
                array(
                    'name' => 'Ernesto',
                    'email' => 'ernesto@smarthospital.tech',
                    'password' =>  bcrypt('ernesto#1221#'),
                ),
            );
        foreach($users as $user){
             DB::table('users')->insert($user);
         }

        $admin =\SmartHospital\User::find(1);
        $admin->assignRole('Admin');
    }
}
