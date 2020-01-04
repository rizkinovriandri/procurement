<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubBarang extends Model
{
    //
    protected $table = 'sub_barang';

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
