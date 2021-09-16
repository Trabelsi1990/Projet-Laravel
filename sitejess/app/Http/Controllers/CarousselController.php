<?php

namespace App\Http\Controllers;

use App\Artisan;
use App\Evenement;
use App\Magasin;
use Illuminate\Http\Request;

class CarousselController extends Controller
{
    // fonction pour l'affichage du caroussel
    // c'est grace a la colonne inCaroussel qui est en booléen 
    //et que c'est l'admin qui choisit de publié n'importe quel 
    //magasin en cochant sur une checkbox et qui met la colonne incaroussel a 1
    public function affichecarou(){
        $shops= Magasin::where('inCaroussel',1)->get();
        $events = Evenement::where('inCaroussel',1)->get();
        $artisans = Artisan::where('inCaroussel',1)->get();
        return view('caroussel',compact(['shops','events','artisans']));
    }
}
