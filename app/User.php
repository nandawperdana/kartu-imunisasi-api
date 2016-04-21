<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //$table->string('name');
            
    protected $fillable = [
        'name','email','password','gender','avatarUrl','country','state','address','phone','statusInfo','profession','tempatLahir','tglLahir','educLevId','imgUsrFileName','imgUsrFilePath','lastStudy','statusInfoUpAt'
    ];

    public function children(){
        return $this->hasMany('\App\Child');
    }

    public function attribute(){
        return $this->belongsTo('App\Attribute');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = [
    //    'password', 'remember_token',
    //];
}
