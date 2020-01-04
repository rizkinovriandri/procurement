<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use File;
use App\Akta;

class Akta extends Model
{
    //
    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }

    

    // protected static function boot() {
    //     parent::boot();

    //     Akta::deleted(function($akta){
    //         $file = public_path().'/documents/akta/'.$akta->filename;
    //         if(File::isFile($file)){
    //              File::delete($file);
    //         }
    //    });
        
        // static::deleting(function($akta) {
        // $file_path = public_path().'/documents/akta/'.$akta->filename;
        // echo $file_path;
        // // if ( File::exists($file_path)) {
        // //         File::delete($file_path);
        // //     } 
        // }
    // );
    // }

    public function getNextId() 
	{

     $statement = DB::select("show table status like 'aktas'");

     return $statement[0]->Auto_increment;
	}
}
