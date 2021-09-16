<?php

namespace App\Models;

use App\Classes\Chasseur;
use App\Classes\Guerrier;
use App\Classes\Mage;
use App\Classes\Prêtre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnage extends Model
{
    use HasFactory;

     protected $fillable = ['psuedo','race_id','classe_id','specialisation_id','proprietaire'];


    public function classe()
    {
        return $this->belongsTo('App\Models\Classe');
    }

    public function race()
    {
        return $this->belongsTo('App\Models\Race');
    }
    public function specialisation()
    {
        return $this->belongsTo('App\Models\Specialisation');
    }



    public function perso()
    {
        if($this->classe->nom_classe == 'guerrier'){
            return new Guerrier($this);
        } 
        if($this->classe->nom_classe == 'mage'){
            return new Mage($this);
        }
        if($this->classe->nom_classe == 'pretre'){
            return new Prêtre($this);
        }
        if($this->classe->nom_classe == 'chasseur'){
            return new Chasseur($this);
        }
    }

}
