<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfx extends Model
{
    //

    protected $table = 'rfxs';

    protected $fillable = 
    [   'rfx_no',
        'rfx_title',
        'transaction_type',
        'rfx_date',
        'sub_deadline',
        'tgl_opening',
        'sc_indicator',
        'rfx_stat',
        'te_start',
        'te_to'
        
    ];

    public function pengadaans(){
        return $this->hasMany('App\Pengadaan','rfx','rfx_no');
    }
}
