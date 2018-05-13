<?php

use Illuminate\Database\Seeder;

class CategoryAssetTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_assets')->insert([
        	'name_category' =>'Backdrop',
        	'details' => 'Backdrop Kanvas',
        	]);
    }
}
