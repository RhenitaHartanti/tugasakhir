<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailAssetPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_asset_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_asset')->unsigned();
            $table->foreign('id_asset')->references('id')->on('assets')->onDelete('cascade');
            $table->integer('id_package')->unsigned();
            $table->foreign('id_package')->references('id')->on('packages')->onDelete('cascade');             
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
        Schema::dropIfExists('detail_asset_packages');
    }
}
