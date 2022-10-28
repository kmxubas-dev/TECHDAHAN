<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use  Database\Seeders\SeederAppReport;
use  Database\Seeders\SeederUser;
use  Database\Seeders\SeederUsersGadget;
use  Database\Seeders\SeederUsersGadgetsOffer;
use  Database\Seeders\SeederUsersGadgetsRating;
use  Database\Seeders\SeederUsersPayment;
use  Database\Seeders\SeederUsersTransaction;

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
            SeederAppReport::class,
            SeederUser::class,
            SeederUsersGadget::class,
            SeederUsersGadgetsOffer::class,
            SeederUsersGadgetsRating::class,
            SeederUsersPayment::class,
            SeederUsersTransaction::class
        ]);
    }
}
