<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Propo;

class adminPropoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // fonction pour afficher les informations sur le site et l'admin
    public function index()
    {
        $propos = Propo::all();
        return view('admin/propos/aboutus_admin',compact('propos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // fonction pour l'ajout d'une information
    public function create()
    {
        return view('admin/propos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // fonction d'enregistrement 
    public function store(Request $request,Propo $propos)
    {
        $validatedData= $request ->validate([

            'image1' => 'required|file|max:5000|image',
            'description' => 'required|min:10',
            'image2' => 'required|file|max:5000|image',
            'description2' => 'required|min:10',
            'nom_photographe'=>'required|min:5',
            'image_photographe' => 'required|file|max:5000|image',
            'description_photographe' => 'required|min:10',
        ]);
        $propo = new Propo();
        request('image1'); 
        $propo->image1 =request('image1')->store('uploads'); 

        request('description'); 
        $propo-> description = request('description');

        request('nom_fondatrice');
        $propo->nom_fondatrice= request('nom_fondatrice');
        request('image2'); 
        $propo->image2 =request('image2')->store('uploads'); 

        request('description2'); 
        $propo->description2 = request('description2');

        request('nom_photographe'); 
        $propo->nom_photographe = request('nom_photographe');

        request('description_photographe'); 
        $propo->description_photographe = request('description_photographe');

        request('image_photographe'); 
        $propo->image_photographe =request('image_photographe')->store('uploads'); 

         $propo->save();   
         return redirect()->route('admin.A_propos.index')->with('creat', 'A propos de nous a bien été enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // permet d'afficher le formulaire de modification
    public function edit($id)
    {
        $propo = Propo::find($id);
        return view('propos/edit',compact('propo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // permet l'enregistrement de la modification
    public function update(Request $request, $id,Propo $propo)
    {

        $propo -> update($request->all()); // ça mets à jour l'enregistrement 
         $propo->description = $request->description;
        
            if($request->has('imag_photographe')){
           
            $propo->image1 =request('image1')->store('uploads');
       
            $propo->image2 =request('image2')->store('uploads');
        
            $propo->image_photographe =request('image_photographe')->store('uploads');
            $propo->save();
        }
        
        return redirect('admin/propos/aboutus_admin')->with('updat', 'A propos de nous updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propo $A_propo)
    {
        // elle permet de supprimer A propos de nous
        $A_propo->delete();
        return redirect()->route('admin.A_propos.index')->with('delet', 'A propos de nous a été supprimé!');
}
    
}
