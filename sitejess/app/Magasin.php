<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
   
    protected $fillable=['magasin_id','nom','description','facebook','instagram','image','site'];
    
    // cette propriete permet d'enregistrer des donné sans mettre quel column de la base de donnée
    // protected $guarded = [];
    public function articles(){
        return $this->hasMany('App\Article','magasin_id');
    }
    public function geolocalisation(){
        return $this->hasOne('App\Geolocalisation','magasin_id');
    }
    public function horaires(){
        return $this->hasMany('App\Horaire','magasin_id'); 
    }
    public function caroussel(){
        return $this->belongsTo('App\Caroussel','magasin_id');
    }
}
