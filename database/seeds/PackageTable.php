<?php

use Illuminate\Database\Seeder;

class PackageTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
        	'name_package' =>'Birthday Package Precious',
        	'details' => 'Backdrop',
        	'price' =>'2000000',
        	'kuota' => '25',
        ]);
    }
}
