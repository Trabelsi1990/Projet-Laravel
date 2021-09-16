<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caroussel extends Model
{
    public function magasins(){
        return $this->hasMany('App\Magasin');
    }
    public function evenements(){
        return $this->hasMany('App\Evenement');
    }
    public function artisans(){
        return $this->hasMany('App\Artisan');
    }
}
