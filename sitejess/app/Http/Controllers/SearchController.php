<?php

namespace App\Http\Controllers;

use App\Evenement;
use Illuminate\Http\Request;
use App\Magasin;
use App\Artisan;
use App\Produit;

class SearchController extends Controller
{
    // fonction pour la barre de recherche coté utilisateur avec le nombre de resultats
    public function search(){
        
        $q = request()->input('q');
       
        
        $mag = Magasin::where('nom','like',"%$q%")
                ->orWhere('description','like',"%$q%")
                ->get();

         $eve = Evenement::where('nom','like',"%$q%")
              ->orWhere('description','like',"%$q%")
              ->orWhere('lieu','like',"%$q%")
              ->get();
              
         $art = Artisan::where('nom','like',"%$q%")
                ->orWhere('marque','like',"%$q%")
                ->orWhere('description','like',"%$q%")
                ->get(); 
                
         $pro = Produit::where('title','like',"%$q%")
                    ->orWhere('subtitle','like',"%$q%")
                    ->orWhere('slug','like',"%$q%")
                    ->orWhere('description','like',"%$q%")
                    ->get(); 
                    
        $count = 
            $mag->count()+
            $eve->count()+ 
            $art->count()+
            $pro->count();
            //dd($count);          
         // return $mag;          
        //dd($mag);
        return view ('shop/search')->with([
        'mag'=>$mag,
        'eve'=>$eve,
        'art'=>$art,
        'pro'=>$pro,
        'count'=>$count
        ]);        
    }
}
