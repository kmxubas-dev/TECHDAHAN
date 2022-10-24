<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederUsersGadgetsOffer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users_gadgets_offers')->insert([
            'gadget_id' => 1,
            'user_id' => 3,
            'status' => 'pending',
            'amount' => 1230000,
            'note' => 'Hehe',
            'created_at' => '2022-11-18 12:27:31',
            'updated_at' => '2022-11-18 12:27:31',
        ]);
        
        DB::table('users_gadgets_offers')->insert([
            'gadget_id' => 1,
            'user_id' => 4,
            'status' => 'pending',
            'amount' => 1230000,
            'note' => 'Hehe',
            'created_at' => '2022-11-18 12:27:31',
            'updated_at' => '2022-11-18 12:27:31',
        ]);
        
        DB::table('users_gadgets_offers')->insert([
            'gadget_id' => 1,
            'user_id' => 5,
            'status' => 'pending',
            'amount' => 1230000,
            'note' => 'Hehe',
            'created_at' => '2022-11-18 12:27:31',
            'updated_at' => '2022-11-18 12:27:31',
        ]);
        
        DB::table('users_gadgets_offers')->insert([
            'gadget_id' => 1,
            'user_id' => 6,
            'status' => 'pending',
            'amount' => 1230000,
            'note' => 'Hehe',
            'created_at' => '2022-11-18 12:27:31',
            'updated_at' => '2022-11-18 12:27:31',
        ]);
    }
}
