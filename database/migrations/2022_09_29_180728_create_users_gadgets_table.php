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
            $table->unsignedInteger('qty')->nullable();
            $table->string('category');
            $table->string('condition');
            $table->text('details');
            $table->text('methods');
            $table->unsignedInteger('price_original');
            $table->unsignedInteger('price_selling');
            $table->integer('bidding_min')->nullable();
            $table->string('bidding_start')->nullable();
            $table->string('bidding_end')->nullable();
            $table->string('payment')->nullable();
            $table->string('img_receipt', 2048)->nullable();
            $table->string('img', 2048)->nullable();
            $table->foreignId('user_id');
            $table->foreignId('buyer_id')->nullable();
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
