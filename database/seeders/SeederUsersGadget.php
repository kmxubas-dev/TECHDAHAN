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
        DB::table('users_gadgets')->insert([
            'status' => 'available',
            'name' => 'Gadget0',
            'category' => 'Phone',
            'description' => 'Description',
            'details' => '{"color":"Black","model":"X123","storage":"258gb"}',
            'price_original' => '2000000',
            'price_selling' => '1500000',
            'condition' => '80',
            'bidding' => false,
            // 'bidding_min' => '',
            // 'bidding_start' => '',
            // 'bidding_end' => '',
            'img_receipt' => 'img/placeholder.jpg',
            'img' => 'img/placeholder.jpg',
            'user_id' => '2'
        ]);
        for($i=1; $i<6; $i++) {
            DB::table('users_gadgets')->insert([
                'status' => 'available',
                'name' => 'Gadget'.$i,
                'category' => 'Phone',
                'description' => 'Description',
                'details' => '{"color":"Black","model":"X123","storage":"258gb"}',
                'price_original' => '2000000',
                'price_selling' => '1500000',
                'condition' => '80',
                'bidding' => true,
                // 'bidding_min' => '',
                // 'bidding_start' => '',
                // 'bidding_end' => '',
                'img_receipt' => 'img/placeholder.jpg',
                'img' => 'img/placeholder.jpg',
                'user_id' => '2'
            ]);
        }
    }
}
