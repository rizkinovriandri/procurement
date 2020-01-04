<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    //
    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
