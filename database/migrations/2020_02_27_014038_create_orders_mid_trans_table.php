<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersMidTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_mid_trans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice')->nullable();
            // $table->string('id_customer');
            $table->string('name_customer');
            $table->string('phone_customer');
            $table->string('address_customer');
            $table->integer('subtotal');
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
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
        Schema::dropIfExists('orders_mid_trans');
    }
}
