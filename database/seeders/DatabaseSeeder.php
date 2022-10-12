<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use  Database\Seeders\SeederUser;
use  Database\Seeders\SeederUsersGadget;
use  Database\Seeders\SeederUsersGadgetsOffer;
use  Database\Seeders\SeederUsersPayment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            SeederUser::class,
            SeederUsersGadget::class,
            SeederUsersGadgetsOffer::class,
            SeederUsersPayment::class
        ]);
    }
}
