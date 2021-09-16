<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Personnage;
use App\Models\Race;
use App\Models\Specialisation;
use App\Classes\Guerrier;
use App\Classes\Mage;
use App\Classes\Prêtre;
use App\Classes\Chasseur;
use Illuminate\Http\Request;


class JeuxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $personnages = Personnage::all();
          $racess = Race::all();
          $classes = Classe::all();
          $specialis = Specialisation::all();

        return view('tableau', compact('personnages','racess','classes','specialis'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $racess = Race::all();
        $classes = Classe::all();
        return view('create', compact('racess','classes'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Specialisation $spe)
    {
        $spe = new Specialisation();
        $spe->nom_specialisation = request('nom_specialisation');
        $spe->classe_id = request('classe_id');
        $spe->save();
        

        $perso = new Personnage();
        $perso->psuedo = request('psuedo');
        $perso->race_id = request('nom_race');
        $perso->classe_id = request('classe_id');
        $perso->proprietaire = request('proprietaire');
        $perso->specialisation_id = $spe->id;
        $perso->save();
     
        return redirect()->route('personnage.index');
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
    public function edit( Personnage $personnage)
    {
       
        $racess = Race::all();
        $classes = Classe::all();
        return view('edit', compact('personnage',$personnage,'racess',$racess,'classes',$classes));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Personnage $personnage)
    {
        $personnage->psuedo = $request->psuedo;
        $personnage->race_id = $request->nom_race;
        $personnage->classe_id = $request->classe_id;
        $personnage->proprietaire = $request->proprietaire;
        $personnage->specialisation->nom_specialisation = $request->nom_specialisation;
        $personnage->specialisation->save();
        $personnage->save();
        return redirect()->route('personnage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnage $personnage)
    {
        $personnage->delete();
        $personnage->specialisation->delete();
        return redirect()->route('personnage.index');
    }
 
}
