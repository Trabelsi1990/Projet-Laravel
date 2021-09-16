<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['classe_nom'];


    
    public function personnage()
    {
        return $this->hasOne('App\Models\Personnage','classe_id');
    }

  

    public function specialisation()
    {
        return $this->hasMany('App\Models\Specialisation','classe_id');
    }
}
