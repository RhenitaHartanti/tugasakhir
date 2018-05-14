<?php

use Illuminate\Database\Seeder;

class AssetTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert([
        	'id_category_asset' =>'1',
        	'name_asset' => 'Backdrop Putih',
        	'price' =>'90000',
        	'total' => '10',
        	'details' =>'Backdrop Baru',
        ]);
    }
}
