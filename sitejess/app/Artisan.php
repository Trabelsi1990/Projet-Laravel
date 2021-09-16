<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    
    protected $fillable = ['id','nom','marque','description','site','facebook','instagram','image'];

    public function articles(){
        return $this->hasMany('App\Article');
    }
    public function caroussel(){
        return $this->belongsTo('App\Caroussel','artisan_id');
    }
}
