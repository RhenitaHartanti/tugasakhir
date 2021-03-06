<?php

use Illuminate\Support\Facades\Schema;
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
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_package')->unsigned();
            $table->foreign('id_package')->references('id')->on('packages')->onDelete('cascade');
            $table->datetime('date_using');
            $table->datetime('date_finish');
            $table->string('theme');
            $table->string('place');
            $table->integer('total_guests');
            $table->string('greeting');
            $table->string('note');
            $table->bigInteger('price');
            $table->enum('order_status',['waiting','accept','reject','expired']);
            $table->char('booking_code');            
            $table->enum('payment_status',['none','paid off']);
            $table->bigInteger('total_payment');
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
        Schema::dropIfExists('orders');
    }
}
