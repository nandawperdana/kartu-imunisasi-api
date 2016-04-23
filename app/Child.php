<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [ 'user_id','name','birthplace','birthday','weight','height','FileNameFoto','PathFoto','gender'];

    public function user(){
		return $this->belongsTo('App\User');
	}

	public function vaccineHistory(){
        return $this->hasMany('\App\VaccineHistory');
    }
}
