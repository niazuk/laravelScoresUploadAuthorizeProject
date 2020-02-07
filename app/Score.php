<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $fillable = ['user_id','level','score'];

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
