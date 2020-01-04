<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Skkem extends Model
{
    //
    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }

    public function getNextId() 
	{

     $statement = DB::select("show table status like 'skkems'");

     return $statement[0]->Auto_increment;
	}
}
