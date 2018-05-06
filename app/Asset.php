<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table='assets';
    protected $fillable=[
    		'id_category_asset',
    	    'name_category',
    		'name_asset',
    		'price', 
    		'details',
    ];
    public function category_asset(){
  	$this->hasMany('Asset');
  }
}
