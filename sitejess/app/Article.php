<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $primaryKey = 'id_article';
    protected $fillable=['description_article','image_article','magasin_id','titre_article','artisan_id'];
    
    public function magasins(){
        return $this->belongsTo('App\Magasin');
    }
    public function restaurants(){
        return $this->belongsTo('App\Restaurant');
    }
    public function artisans(){
        return $this->belongsTo('App\Artisan');
    }
}