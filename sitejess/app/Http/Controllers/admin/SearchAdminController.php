<?php

namespace App\Http\Controllers\admin;

use App\Artisan;
use App\Evenement;
use App\Http\Controllers\Controller;
use App\Magasin;
use App\Produit;
use Illuminate\Http\Request;

class SearchAdminController extends Controller
{
    // fonction permettant de rechercher un magasin et de nous afficher le nombre de resultats coté admin
    public function searchAdmin(){
        
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
        return view ('admin/search/index')->with([
        'mag'=>$mag,
        'eve'=>$eve,
        'art'=>$art,
        'pro'=>$pro,
        'count'=>$count
        ]);        
    }
}
