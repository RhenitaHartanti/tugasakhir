<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetPackage extends Model
{
    protected $table='asset_package';
    protected $fillable=[
    		'package_id',
    	    'asset_id',
    ];
    
    public function asset(){
        $this->belongsTo('App\Asset');
    }

    public function package(){
      	$this->belongsTo('App\Package');
    }


}
