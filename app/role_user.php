<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class role_user extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_user';
    public $timestamps = false;
    protected $primaryKey = 'user_id';

   	public function user() {
    	return $this->belongsTo('App\User');
    }
      
}
