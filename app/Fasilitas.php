<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    //
    protected $table = 'fasilitases';

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
