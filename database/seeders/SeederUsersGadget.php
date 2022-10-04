<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederUsersGadget extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<5; $i++) {
            DB::table('users_gadgets')->insert([
                'status' => 'admin',
                'name' => 'Gadget'.$i,
                'category' => 'Phone',
                'description' => 'Description',
                'color' => 'Black',
                'model' => 'X123',
                'storage' => '258gb',
                'price_original' => '20000',
                'price_selling' => '15000',
                'condition' => '80',
                'bidding' => true,
                // 'bidding_min' => '',
                // 'bidding_start' => '',
                // 'bidding_end' => '',
                'img_receipt' => 'img/placeholder.jpg',
                'img' => 'img/placeholder.jpg',
                'user_id' => '3'
            ]);
        }
    }
}
