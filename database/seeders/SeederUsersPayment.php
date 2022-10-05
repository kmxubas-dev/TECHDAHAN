<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederUsersPayment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users_payments')->insert([
            'user_id' => 3,
            'type' => 'gcash',
            'name' => 'USER ACCOUNT NAME',
            'number' => '09987654321'
        ]);
    }
}
