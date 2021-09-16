<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $primaryKey = 'id_magasin';
    protected $fillable=['id_magasin','nom','description','facebook','instagram','image'];
    
    // cette propriete permet d'enregistrer des donné sans mettre quel column de la base de donnée
    // protected $guarded = [];
    public function articles(){
        return $this->hasMany('App\Article','id_magasin');
    }
    public function geolocalisation(){
        return $this->hasOne('App\Geolocalisation','id_magasin');
    }
    public function horaires(){
        return $this->hasMany('App\Horaire','id_magasin'); 
    }
}
