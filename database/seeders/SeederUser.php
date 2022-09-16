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
    }
}
