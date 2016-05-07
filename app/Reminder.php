<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reminder extends Model
{
    protected $fillable = [ 'message','month','vaccine_id'];

    public function attribute(){
		return $this->belongsTo('App\Attribute');
	}

	
}	