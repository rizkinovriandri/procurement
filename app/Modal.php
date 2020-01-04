<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendor;

class Modal extends Model
{
    //
    public function user() {
    	return $this->belongsTo('App\Vendor');
    }
}
