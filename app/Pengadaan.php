<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    //
    protected $fillable = 
    [   'pr_no',
        'pr_line',
        'shopping_cart',
        'transfer_date',
        'pgr',
        'rfx',
        'no_material',
        'nama_material',
        'quantity',
        'uom',
        'unit_price',
        'total_budget',
        'pr_cur',
        'po_no',
        'po_line',
        'nego_start',
        'nego_to',
        'clarification_start',
        'clarification_to'
    ];

    public function rfx1(){
        return $this->belongsTo('App\Rfx','rfx_no');
    }
}
