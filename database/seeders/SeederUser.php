<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'type' => 'user',
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'type' => 'user',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'type' => 'user',
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'type' => 'user',
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'type' => 'user',
            'name' => 'User3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
