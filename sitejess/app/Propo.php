<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propo extends Model
{
    protected $fillable=['id','image1','description','nom_fondatrice','image2','description2','nom_photographe',
                         'image_photographe','description_photographe'];
}
