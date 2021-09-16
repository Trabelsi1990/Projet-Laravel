<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function __construct()
    {
    
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $events = Evenement::all();
            if (Gate::allows('admin')) {
                return view('evenement/event_admin', compact('events'));
            }
            return view('evenement/event', compact('events'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenement/createEvent');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Evenement $events)
    {
        $price = str_replace (',','.',$request->prix);
        $validateData= $request->validate([
            'nom'=>'required|min:5',
            'lieu'=>'required|min:5',
            'date'=>'required',
            'heure'=>'required',
            'prix'=>'required',
            'description'=>'required',
        ]);
        $events= new Evenement();
        $events->nom = request('nom');
        $events->lieu = request('lieu');
        $events->date = request('date');
        $events->heure = request('heure');
        $events->prix = $price;
        $events->description = request('description');
        $events->image = request('image')->store('uploads');
        $events->save();
        return redirect('/evenement')->with('create','votre evenement a été crée avec success');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ça passera ici quand on tape /shop/1 ou /shop/10 etc...
    public function show($id)
    {
        $event = Evenement::findOrFail($id);
        if(Gate::allows('admin')){
            return view('evenement/eventShowAdmin',[
                'event'=>$event,
            ]);
        }
        return view('evenement/eventShow',['event'=>$event]);
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // tu vois c'est le paramêtre id_magasin qui lui manque
    // ça veut dire qu'il manque dans le lien
    public function edit($id)
    {
        $event= Evenement::find($id);
        return view('evenement/editEvent',compact('event'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request,Evenement $event,$id)
    {
            $event = Evenement::find($id);
            $event->nom = $request->nom;
            $event->date = $request->date;
            $event->lieu = $request->lieu;
            $event->heure = $request->heure;
            $event->prix = $request->prix;
            $event->description = $request->description;
        //demande si l'image a modifier existe, il la laisse sinon il la modifie dans le dossier update
        if($request->has('image')){
            $event->image = request('image')->store('uploads');
            $event->save();
        }
       // $event->save();
       return redirect('/evenement')->with('update','votre Evenement a été modifié avec success :) !');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Evenement::find($id);
        $event->delete(); 
        return redirect('/evenement')->with('destroy','votre evenement a été supprimer !');
    }   
}
