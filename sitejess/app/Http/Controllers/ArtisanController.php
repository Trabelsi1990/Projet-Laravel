<?php

namespace App\Http\Controllers;

use App\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArtisanController extends Controller
{
    public function __construct()
    {
        //  
    }
// fonction pour l'affichage des créateurs locaux
    public function index(){
        $artisans = Artisan::all();
        // return Session::all();
        return view('artisan/artisan',compact('artisans'));
    }
// fonction pour l'affichage des articles de chaque créateur locale
    public function show($id){
        $artisan = Artisan::findOrFail($id);
        return view('artisan/show',['artisan'=>$artisan]);
    }
}
