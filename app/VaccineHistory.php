<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccineHistory extends Model
{
    protected $fillable = [ 'child_id','date','place','vaccine_type','vaccine_id'];

    public function attribute(){
		return $this->belongsTo('App\Attribute');
	}
    public function child(){
		return $this->belongsTo('App\Child');
	}

	
}	