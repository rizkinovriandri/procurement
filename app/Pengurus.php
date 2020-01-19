<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model

{
    //

    protected $fillable = ['nama','jabatan','no_telepon','no_hp','email'];

    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
}
