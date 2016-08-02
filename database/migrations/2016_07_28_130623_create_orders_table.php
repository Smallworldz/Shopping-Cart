<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('email');
            $table->integer('user_id');
            $table->integer('order_id');
            $table->integer('mobile');
            $table->bigInteger('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *id,address,user_id,total,order_id,mobile,phone,

     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
