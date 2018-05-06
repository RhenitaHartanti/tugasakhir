<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=[
    	'id','id_user','id_package','date_order','date_using','time_using','name_target','theme','place','total_guests','greeting','note','order_status','booking_code','payment_status',
    ];
    protected $guarded=[];
    // public $timestamps=false;

    public function user()
    {
	  	return $this->belongsTo('App\User','id_user','id');
	}

	public function package()
	{
	  	return $this->belongsTo('App\Package','id_package','id');
	}
}
