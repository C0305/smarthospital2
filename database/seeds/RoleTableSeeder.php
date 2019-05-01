<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            Array(
                'name' => 'Admin',
                'description' => 'Usuario Administrador',
            )
        ];
        foreach ($roles as $value) {
            \Spatie\Permission\Models\Role::create($value);
        }
    }
}
