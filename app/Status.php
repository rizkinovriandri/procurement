<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
     //
     protected $table = 'statuses';

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
