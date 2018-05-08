<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $fillable=[
    		'id',
    		'id_order',
    		'booking_code',    		
    		'attachment',
    		'payment_status'
    	];

    public function order()
    {
        return $this->belongsTo('App\Order','id_order','id');
    }
}
