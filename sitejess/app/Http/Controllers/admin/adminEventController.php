<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Evenement;


class adminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // fonction permettant l'affichage des evenements
        $events = Evenement::all();
        return view('admin/evenement/event_admin', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fonction d'affichage du formulaire d'ajout d'un evenement
        return view('admin/evenement/createEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //fonction permettant d'enregistrer un evenement
        
        //validation des donnée avant la creation de l'evenement
        $validateData= $request->validate([
            'nom'=>'required',
            'lieu'=>'required',
            'date'=>'required',
            'heure'=>'required',
            'prix'=>'required',
            'description'=>'required',
        ]);
        $price = str_replace (',','.',$request->prix);
        $events= new Evenement();
        $events->nom = request('nom');
        $events->lieu = request('lieu');
        $events->date = request('date');
        $events->heure = request('heure');
        $events->prix = $price;
        $events->description = request('description');
        $events->image = request('image')->store('uploads');
        $events->inCaroussel = false;
        $events->save();
        return redirect()->route('admin.evenement.index')->with('create','votre evenement a été crée avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // fonction qui permet d'afficher les details de l'evenement

        $event = Evenement::findOrFail($id);
        if(Gate::allows('edit-shop')){
            return view('admin/evenement/eventShowAdmin',[
                'event'=>$event,
            ]);
        }
        return view('admin/evenement/eventShowadmin',['event'=>$event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // fonction d'affichage du formulaire de modification d'un formulaire
        $events= Evenement::find($id);
        return view('admin/evenement/editEvent',compact('events'));
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
        // fonction qui permet d'enregistrer la modification 

      //validation des donnée avant la creation de l'evenement
        $validateData= $request->validate([
            'nom'=>'required',
            'lieu'=>'required',
            'date'=>'required',
            'heure'=>'required',
            'prix'=>'required',
            'description'=>'required',
        ]);
       $price = str_replace (',','.',$request->prix);
        $events = Evenement::find($id);
        $events->nom = $request->nom;
        $events->date = $request->date;
        $events->lieu = $request->lieu;
        $events->heure = $request->heure;
        $events->prix = $price;
        $events->description = $request->description;
    //demande si l'image a modifier existe, il la laisse sinon il la modifie dans le dossier update
    if($request->has('image')){
        $events->image = request('image')->store('uploads');
        $events->save();
    }
   return redirect('/admin/evenement')->with('update','votre Evenement a été modifié avec success :) !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fonction pour la suppression d'un formulaire

        $events = Evenement::find($id);
        $events->delete(); 
        return redirect('/admin/evenement')->with('destroy','votre evenement a été supprimer !');
    }
}
