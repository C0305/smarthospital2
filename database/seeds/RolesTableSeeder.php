<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
            ]
        ];
        foreach ($roles as $value) {
            $rol = new \Spatie\Permission\Models\Role($value);
            $rol->save();
        }
        $admin = \Spatie\Permission\Models\Role::find(1);
        $admin->givePermissionTo(\Spatie\Permission\Models\Permission::all());
    }
}
