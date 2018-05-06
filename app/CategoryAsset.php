<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryAsset extends Model
{
    protected $table='category_assets';
    protected $fillable=[
    		'name_category',
    		'details',
    ];
  //mendeklarasikan primary key, bahwa id_category asset dimiliki oleh tabel asset
  public function asset(){
  	$this->belongsTo('Asset');
  }
}