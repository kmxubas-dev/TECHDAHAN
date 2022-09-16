<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGadgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_gadgets', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('name');
            $table->string('color');
            $table->string('model');
            $table->string('storage');
            $table->string('condition');
            $table->integer('price_original');
            $table->integer('price_selling');
            $table->string('payment')->nullable();
            $table->string('receipt');
            $table->foreignId ('user_id');
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
        Schema::dropIfExists('users_gadgets');
    }
}
