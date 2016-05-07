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
        'name','email','password','gender','avatarUrl','country','state','address','phone','statusInfo','tempatLahir','tglLahir','imgUsrFileName','imgUsrFilePath','statusInfoUpAt','gcm_id'
    ];

    public function children(){
        return $this->hasMany('\App\Child');
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
