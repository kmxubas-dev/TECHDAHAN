<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeederUsersTransaction extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1; $i<=12; $i++) {
            for($ii=1; $ii<=3; $ii++) {
                $price = rand(1000000,2000000);
                DB::table('users_transactions')->insert([
                    'status' => 'paid',
                    'code' => '#22CB4E3FTD',
                    'info' => '{"id":1,"status":"available","name":"Gadget0","qty":3,"category":"Phone","condition":"80","details":{"description":"Description","model":"X123","storage":"258gb"},"methods":{"bid":false,"offer":true},"installment":{"status":true,"duration":6},"price_original":20000,"price_selling":15000,"bidding_min":0,"bidding_start":null,"bidding_end":null,"payment":null,"img_receipt":"img\/placeholder.jpg","img":"img\/placeholder.jpg","user_id":2,"created_at":"2022-11-19T13:30:31.000000Z","updated_at":"2022-11-19T13:30:31.000000Z"}',
                    'price' => $price,
                    'method' => 'default',
                    'payment' => '{"id":null,"status":"success","method":"credit","type":"direct","checkout_url":null}',
                    'gadget_id' => 1,
                    'seller_id' => 2,
                    'buyer_id' => 3,
                    'created_at' => '2022-0'.sprintf('%02d', $i).'-01 12:00:00',
                    'updated_at' => '2022-0'.sprintf('%02d', $i).'-01 12:00:00'
                ]);
            }
        }
    }
}
