<?php

namespace App\Http\Controllers\admin;
use App\Article;
use App\Artisan;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     * permet l'affichage de tout les artisan dispo dans cette categorie
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $artisans = Artisan::all();
         if (Gate::allows('edit-shop','admin')) {
             return view('admin/artisan/artisanAdmin',compact('artisans'));
            } 
        return view('artisan/artisan',compact('artisans'));
    }

    /**
     * Show the form for creating a new resource.
     * nous renvoie sur le formulaire de la creation d'un artisan 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/artisan/create');
    }

    /**
     * Store a newly created resource in storage.
     * permet d'enregistrer toute les informations qui ont été mis 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom'=>'required',
            'marque'=>'required',
            'description'=>'required',
            'image' => 'required|file|max:5000|image',
            // 'site'=>'required',
            'facebook'=>'required',
            'instagram'=>'required'
        ]);
        $artisan = new Artisan();
        $artisan->nom  = request('nom');
        $artisan->marque = request('marque');
        $artisan->description = request('description');
        $artisan->image = request('image')->store('uploads');
        $artisan->site =request('site');
        $artisan->facebook = request('facebook');
        $artisan->instagram = request('instagram');
        $artisan->inCaroussel = false;
        $artisan->save();
        return redirect()->route('admin.artisan.index')->with('create','lartisan a été crée');
    }

    /**
     * Display the specified resource.
     * pemet d'afficher tout les details et articles de l'artisan en question
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artisan = Artisan::find($id);
        return view('admin/artisan/artisanShowAdmin',compact('artisan'));

    }

    /**
     * Show the form for editing the specified resource.
     * nous renvoie vers le formulaire de la modification
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $artisan= Artisan::find($id);
        return view('admin/artisan/edit',compact('artisan'));
    }

    /**
     * Update the specified resource in storage.
     * function permet de mettre a jour l'enregistrement en cas de modification
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nom'=>'required',
            'marque'=>'required',
            'description'=>'required',
            'image' => 'required|file|max:5000|image',
            'site'=>'required',
            'facebook'=>'required',
            'instagram'=>'required'
        ]);
        $artisan = Artisan::find($id);
        $artisan->nom=$request->nom;
        $artisan->marque=$request->marque;
        $artisan->description=$request->description;
        $artisan->site=$request->site;
        $artisan->facebook=$request->facebook;
        $artisan->instagram=$request->instagram;
       
        if($request->has('image')){
            $artisan->image =request('image')->store('uploads');
            $artisan->save();
        }
       
       
        return redirect()->route('admin.artisan.index')->with('update','votre artisan a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     * permet la suppression d'un Artisan 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artisan = Artisan::find($id);
        $artisan->articles()->delete();
        $artisan->delete();
        return redirect()->route('admin.artisan.index')->with('delete','votre artisan a été supprimer');
    }
    
}
