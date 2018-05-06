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
            $table->date('date_order');
            $table->date('date_using');
            $table->time('time_using');
            $table->string('theme');
            $table->string('place');
            $table->integer('total_guests');
            $table->string('greeting');
            $table->string('note');
            $table->enum('order_status',['waiting','accept']);
            $table->enum('payment_status',['none','paid off']);
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
