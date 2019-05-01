<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    // Global, need it to work
	    $this->call(MexicoStatesSeed::class);
        //$this->call(PermissionTableSeeder::class);
    
        // Just 4 demo or dummy data
        //$this->call(AccountsCustomerSeeder::class);
        //$this->call(ProceduresTypesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(MenuTable::class);
        $this->call(UsersTableSeeder::class);
        //$this->call(RoleHasPermissionsTableSeeder::class);
        //$this->call(DemoPatients::class);
    }
}
