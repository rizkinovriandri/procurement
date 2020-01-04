<?php

namespace App;
use File;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //

    // protected static function boot() {
    //       parent::boot();
    //       static::deleting(function($vendor) {
    //         $vendor->aktas()->delete();
    //   });
    // }

    public function aktas(){
    	return $this->hasMany('App\Akta');
    }

    public function skkems(){
    	return $this->hasMany('App\Skkem');
    }

    public function siups(){
    	return $this->hasMany('App\siup');
    }

    public function tdps(){
    	return $this->hasMany('App\tdp');
    }

    public function siujks(){
    	return $this->hasMany('App\Siujk');
    }
    
    public function apis(){
    	return $this->hasMany('App\Api');
    }

    public function pengurus(){
    	return $this->hasMany('App\Pengurus');
    }

    public function rekenings(){
    	return $this->hasMany('App\Rekening');
    }

    public function modals()
    {
      return $this->hasOne('App\Modal');
    } 

    public function lapkeus()
    {
      return $this->hasMany('App\Lapkeu');
    } 

    public function perpajakans()
    {
      return $this->hasMany('App\Perpajakan');
    } 

    public function tenagaahlis()
    {
      return $this->hasMany('App\TenagaAhli');
    }
    
    public function sertifikats()
    {
      return $this->hasMany('App\Sertifikat');
    }

    public function fasilitas()
    {
      return $this->hasMany('App\Fasilitas');
    }

    public function pengalamans()
    {
      return $this->hasMany('App\Pengalaman');
    }

    public function keagenans()
    {
      return $this->hasMany('App\Keagenan');
    }

    public function bidangs()
    {
      return $this->hasOne('App\Bidang');
    }

    public function subbarangs()
    {
      return $this->hasMany('App\SubBarang');
    }

    public function subjasas()
    {
      return $this->hasMany('App\SubJasa');
    }

    public function statuses()
    {
      return $this->hasOne('App\Status');
    }

    public function kontraks()
    {
      return $this->hasMany('App\Kontrak', 'vendor', 'sapno');
    }

    public function evaluasis()
    {
      return $this->hasMany('App\Evaluasi', 'vendor_no', 'sapno');
    }
}
