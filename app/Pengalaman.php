<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    //
    protected $table = 'pengalamans';

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
