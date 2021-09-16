<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialisation extends Model
{
    use HasFactory;
    protected $fillable = ['nom_specialisation','classe_id'];



    public function classe()
    {
        return $this->belongsTo('App\Models\Classe');
    }

    public function personnage()
    {
        return $this->hasOne('App\Models\Personnage','specialisation_id');
    }
}
