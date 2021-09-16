<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Magasin;
use App\Artisan;
use App\Evenement;

class AdminCarousselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //cette fonction me permet d'afficher tout les magasins 
      //pour la selection des magasins a afficher dans le caroussel
        $shops= Magasin::all();
        $events = Evenement::all();
        $artisans = Artisan::all();
        return view('admin/caroussel/carouse_admin',compact('shops','events','artisans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // sa prepare les magasins pour l'envoyer dans le caroussel
        $allmags = Magasin::all();
        foreach ($allmags as  $all){
            $all->inCaroussel = false;
            $all->save();
        }
        if($request->caroussel){
          $mags= $request->caroussel;
            foreach ($mags as  $mag) {
              $mag = Magasin::find($mag);
                $mag->inCaroussel = true;
                $mag->save();
        }
    }
         // sa prepare les evenements pour l'envoyer dans le caroussel
        $allevents = Evenement::all();
          foreach ($allevents as  $allevent){
            $allevent->inCaroussel = false;
            $allevent->save();
        }
        if($request->carousselEvent){
          $allevents= $request->carousselEvent;
            foreach ($allevents as  $allevent) {
             $allevent = Evenement::find($allevent);
                $allevent->inCaroussel = true;
                $allevent->save();
        }
        }
         // sa prepare les artisans pour l'envoyer dans le caroussel
        $allartisans = Artisan::all();
          foreach ($allartisans as  $allartisan){
            $allartisan->inCaroussel = false;
            $allartisan->save();
        }
        if($request->carousselArtisan){
            $allartisans= $request->carousselArtisan;
          foreach ($allartisans as  $allartisan) {
            $allartisan = Artisan::find($allartisan);
            $allartisan->inCaroussel = true;
            $allartisan->save();
            
          }
        }

        return redirect()->route('admin.caroussel.index')->with('ajout','vos magasins ont été ajouter au caroussel');
    }
// permet d'afficher les magasins dans le caroussel
    public function affichecarou(){
        $shops= Magasin::where('inCaroussel',1)->get();
        $events = Evenement::where('inCaroussel',1)->get();
        $artisans = Artisan::where('inCaroussel',1)->get();
        return view('welcome',compact(['shops','events','artisans']));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
