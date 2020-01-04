<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    //
    public function vendor(){
        return $this->belongsTo('App\Vendor', 'sapno', 'vendor');
    }
}
