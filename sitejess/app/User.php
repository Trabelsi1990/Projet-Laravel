<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    // function qui regarde les roles si c'est un admin ou non 
    public function isAdmin(){
        return $this->roles()->where('name','admin')->first();
    }
    public function isAuteur(){
        return $this->roles()->where('name','auteur')->first();
    }
    // function qui relie le nom de l'utilisateur au roles qui lui sont attribué
    public function hasAnyRole(array $roles){
        return $this->roles()->whereIn('name',$roles)->first();
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }
}
