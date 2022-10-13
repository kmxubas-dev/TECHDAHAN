<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('info');
            $table->unsignedInteger('price');
            $table->string('method');
            $table->string('payment');
            $table->string('payment_amount');
            $table->foreignId('bid_id')->nullable();
            $table->foreignId('offer_id')->nullable();
            $table->foreignId('gadget_id');
            $table->foreignId('seller_id');
            $table->foreignId('buyer_id');
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
        Schema::dropIfExists('users_transactions');
    }
}
