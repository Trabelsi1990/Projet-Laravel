<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
  
    protected $fillable=['nom','date','heure','lieux','prix','description','image'];

    public function caroussel(){
        return $this->belongsTo('App\Caroussel','evenement_id');
    }
    protected $dates= [
        'date',
        'heure'
    ];
}
