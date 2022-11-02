<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'type' => 'admin',
            'status' => 'enabled',
            'name' => '{"full":"Admin Admin","fname":"Admin","lname":"Admin"}',
            'phone' => '+639111111111',
            'address' => 'Address',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'profile_photo_path' => 'img/placeholder.jpg',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'type' => 'user',
            'status' => 'enabled',
            'name' => '{"full":"Zero Seller","fname":"Zero","lname":"Seller"}',
            'phone' => '+639111111111',
            'address' => 'Address',
            'email' => 'seller@gmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'profile_photo_path' => 'img/placeholder.jpg',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'type' => 'user',
            'status' => 'enabled',
            'name' => '{"full":"Zero User","fname":"Zero","lname":"User"}',
            'phone' => '+639111111111',
            'address' => 'Address',
            'email' => 'user@gmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'profile_photo_path' => 'img/placeholder.jpg',
            'password' => Hash::make('password'),
        ]);

        for($i=1; $i<=3; $i++) {
            DB::table('users')->insert([
                'type' => 'user',
                'status' => 'enabled',
                'name' => '{"full":"User '.$i.'","fname":"'.$i.'","lname":"User"}',
                'phone' => '+639111111111',
                'address' => 'Address',
                'email' => 'user'.$i.'@gmail.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'profile_photo_path' => 'img/placeholder.jpg',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
