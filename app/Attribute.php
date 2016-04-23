<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [ 'type','name'];

	public function vaccineHistory(){
		return $this->hasMany('\App\Attribute');
	}
}
