<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class User extends Authenticatable
{
    use SyncableGraphNodeTrait;

    protected static $graph_node_fillable_fields = ['email', 'imgUsrFilePath','name','facebook_id'];
    protected static $graph_node_field_aliases = [
        'id' => 'facebook_id',
        'email' => 'email',
        'picture.url' => 'imgUsrFilePath',
        'name' => 'name',
    ];
            
    protected $fillable = [
        'name','email','password','gender','avatarUrl','country','state','address','phone','statusInfo','tempatLahir','tglLahir','imgUsrFileName','imgUsrFilePath','statusInfoUpAt','gcm_id','facebook_id'
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
