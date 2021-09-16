<?php

namespace App\Http\Controllers; // 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Magasin;
use App\Article;
use App\Geolocalisation;
use App\Horaire;

use function GuzzleHttp\Promise\all;

class Magasin_controller extends Controller
{
    public function __construct()
    {
        //    $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // fonction d'affichage des magasins coté utilisateur
    public function index(Request $request)
    {
 
        if($request->has('categorie')){
            $cate = $request->categorie;
            $shops = Magasin::where('categorie',$cate)->get();
        }
        else{
            $shops = Magasin::all();
        }
       
        if (Gate::allows('admin')) {
            return view('shop/shop_admin', compact('shops'));
        }
        return view('shop/shop', compact('shops'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Magasin $shop)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // fonction d'affichage des articles d'un magasin
    public function show($id_magasin)
    {

        $shop = Magasin::findOrFail($id_magasin);
        return view('shop/shop_show', ['shop' => $shop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit()
    {
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magasin $shop)
    {
 
    }

    

}
