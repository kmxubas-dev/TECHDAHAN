<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGadgetsOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_gadgets_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gadget_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->unsignedInteger('amount');
            $table->text('note');
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
        Schema::dropIfExists('users_gadgets_offers');
    }
}
