<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table='packages';
    protected $fillable=[
        'id_asset',
    		'name_package',
        'type',
    		// 'details',
    		'price',
        'kuota',        
    ];
  //mendeklarasikan primary key, bahwa id_package dimiliki oleh tabel order
  public function orders(){
  	return $this->hasMany('App\Order');
  }
  public function assets(){
    return $this->belongsToMany('App\Asset','asset_package','package_id','asset_id');
  }
}
