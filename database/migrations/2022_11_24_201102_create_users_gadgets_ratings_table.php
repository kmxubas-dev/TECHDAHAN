<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGadgetsRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_gadgets_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rate');
            $table->text('feedback');
            $table->foreignId('gadget_id');
            $table->foreignId('seller_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_gadgets_ratings');
    }
}
