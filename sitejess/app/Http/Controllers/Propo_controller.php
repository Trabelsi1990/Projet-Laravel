<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Propo;

class Propo_controller extends Controller
{
    public function __construct()
    {
    
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // fonction pour afficher les informations concernant le site et l'admin
    public function index()
    {
        $propos = Propo::all();
        return view('propos/aboutus',compact('propos')); 
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
    public function store(Request $request)
    {
       
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
       
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request,Propo $A_propo)
    {
    //     // dd($A_propo);
    //     // $propo = Propo::find($id);
    //    // dd($id);
    //     $A_propo -> update($request->all()); // ça mets à jour l'enregistrement 
    //     // $propo->description = $request->description;
    //     // $propo->save();
    //         if($request->has('imag_photographe')){
           
    //         $A_propo->image1 =request('image1')->store('uploads');
       
    //         $A_propo->image2 =request('image2')->store('uploads');
        
    //         $A_propo->image_photographe =request('image_photographe')->store('uploads');
    //         $A_propo->save();
    //     }
        
    //     return redirect('admin/propos/aboutus_admin')->with('updat', 'A propos de nous updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propo $A_propo)
    {
        
    }

}
