<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    //
    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
