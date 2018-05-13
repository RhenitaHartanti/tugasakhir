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
            'total',
    		'details',
    ];
    
    public function category_asset(){
      	$this->hasMany('Asset');
      }

    public function package(){
        return $this->belongsToMany('App\Package','asset_package','asset_id','package_id')->withTimestamps();
    }

}
