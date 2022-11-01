<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class SeederNotification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1; $i<=3; $i++) {
            DB::table('notifications')->insert([
                'id' => Str::uuid(),
                'type' => 'App\Notifications\UserNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => 3,
                'data' => '{"transaction_id":38,"type":"transaction","link":"http:\/\/safety4kids.test\/transaction\/'.($i+10).'","message":"Zero User successfully purchased Gadget0"}',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            DB::table('notifications')->insert([
                'id' => Str::uuid(),
                'type' => 'App\Notifications\UserNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => 3,
                'data' => '{"transaction_id":38,"type":"transaction","link":"http:\/\/safety4kids.test\/transaction\/'.($i+11).'","message":"Zero User successfully purchased Gadget0"}',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            DB::table('notifications')->insert([
                'id' => Str::uuid(),
                'type' => 'App\Notifications\UserNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => 3,
                'data' => '{"transaction_id":38,"type":"transaction","link":"http:\/\/safety4kids.test\/transaction\/'.($i+12).'","message":"Zero User successfully purchased Gadget0"}',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        for($i=1; $i<=3; $i++) {
            DB::table('notifications')->insert([
                'id' => Str::uuid(),
                'type' => 'App\Notifications\UserNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => 2,
                'data' => '{"transaction_id":38,"type":"transaction","link":"http:\/\/safety4kids.test\/transaction\/38","message":"Zero User successfully purchased Gadget0"}',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
