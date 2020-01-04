<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubJasa extends Model
{
    //
    protected $table = 'sub_jasa';

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
