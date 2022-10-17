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
            'qty' => 3,
            'category' => 'Phone',
            'details' => '{"description":"Description","model":"X123","storage":"258gb"}',
            'methods' => '{"bid":false,"offer":true}',
            'installment' => '{"status":true,"duration":6}',
            'price_original' => '2000000',
            'price_selling' => '1500000',
            'condition' => '80',
            // 'bidding_min' => '',
            // 'bidding_start' => '',
            // 'bidding_end' => '',
            'img_receipt' => 'img/placeholder.jpg',
            'img' => 'img/placeholder.jpg',
            'user_id' => '2',
            'created_at' => '2022-11-19 13:30:31',
            'updated_at' => '2022-11-19 13:30:31',
        ]);
        for($i=1; $i<6; $i++) {
            DB::table('users_gadgets')->insert([
                'status' => 'available',
                'name' => 'Gadget'.$i,
                'qty' => 1,
                'category' => 'Phone',
                'details' => '{"description":"Description","model":"X123","storage":"258gb"}',
                'methods' => '{"bid":true,"offer":true}',
                'installment' => '{"status":true,"duration":12}',
                'price_original' => '2000000',
                'price_selling' => '1500000',
                'condition' => '80',
                'bidding_min' => 1500000,
                'bidding_start' => '',
                'bidding_end' => '',
                'img_receipt' => 'img/placeholder.jpg',
                'img' => 'img/placeholder.jpg',
                'user_id' => '2',
                'created_at' => '2022-11-19 13:30:31',
                'updated_at' => '2022-11-19 13:30:31',
            ]);
        }
    }
}
