<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
   
    protected $fillable = ['hor_ouverture','hor_fer_mat','hor_deb_aprem','hor_fermeture','magasin_id','jours'];

    public function magasins(){
        return $this->belongsTo('App\Magasin');
    }
    public function restaurants(){
        return $this->belongsTo('App\Restaurant');
    }

    protected $dates=[
        'hor_ouverture',
        'hor_fer_mat',
        'hor_deb_aprem',
        'hor_fermeture'
    ];
    // protected $casts = [
    //     'dates' => 'times',
    // ];
}
