<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table='packages';
    protected $fillable=[
    		'name_package',
    		'details',
    		'price'
    ];
  //mendeklarasikan primary key, bahwa id_package dimiliki oleh tabel order
  public function orders(){
  	return $this->hasMany('App\Order');
  }
}
