<?php

use Illuminate\Database\Seeder;

class AccountsCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts_customers')->insert([
            'rfc' => 'SMART234123',
            'business_name' => 'SmartHospital Demo',
            'database' => 'valhalla',
            'phone' => '897182391',
            'users' => 100,
            'status' => 'Activa',
            'general_mexico_state_id' => 1
        ]);
    }
}
