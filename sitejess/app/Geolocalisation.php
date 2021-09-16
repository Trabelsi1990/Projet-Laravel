<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geolocalisation extends Model
{
  
    protected $fillable = ['adresse','longitude','latitude','magasin_id'];

    public function magasins(){
        return $this->belongsTo('App\Magasin');
    }
    public function restaurants(){
        return $this->belongsTo('App\Restaurant');
    }
}
