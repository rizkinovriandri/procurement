<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenagaAhli extends Model
{
    //
    protected $table = 'tenagaahli';

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
