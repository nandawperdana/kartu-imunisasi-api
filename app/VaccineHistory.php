<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [ 'child_id','date','place','vaccine_type'];

    public function child(){
		return $this->belongsTo('App\Child');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}	