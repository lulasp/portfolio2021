<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

  public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
   {
       $this->attributes['password'] = bcrypt($password);
   }

   public function pat(){

    return $this->hasMany(PAT::class, 'user_id');
   }

   public function patf(){

    return $this->hasMany(PATF::class, 'user_id');
   }
}
