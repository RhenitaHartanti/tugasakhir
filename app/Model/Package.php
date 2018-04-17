<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table='packages';
    protected $primaryKey='id_package';

    //ADD
    protected $fillable=[];
    protected $guarded=[];
    public $timestamps=false;
}
