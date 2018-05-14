<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category_asset')->unsigned();
            $table->foreign('id_category_asset')->references('id')->on('category_assets')->onDelete('cascade');       
            $table->string('name_asset');
            $table->bigInteger('price');
            $table->integer('total');            
            $table->string('details');
            $table->enum('status',[1,0])->default(1);            
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
        Schema::dropIfExists('assets');
    }
}
