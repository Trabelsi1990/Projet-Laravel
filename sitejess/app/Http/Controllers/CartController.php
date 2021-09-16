<?php

namespace App\Http\Controllers;

use App\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // fonction pour l'e commerce
    public function index()
    {
        return view('cart/index');
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
       //cherche si le produit existe deja dans le panier
       $duplicata=Cart::search(function ($cartItem, $rowId) use($request) {
        return $cartItem->id == $request->produit_id;
       });
       //il rentre dans cette condition pour voir si le produit existe deja 
       if($duplicata->isNotEmpty()){
        return redirect()->route('boutique.index')->with('success','Le produit a deja été ajouter au panier'); 
       }
       // ajouter un produit a notre panier
       $produit = Produit::find($request->produit_id);

        Cart::add($produit->id,$produit->title,1,$produit->price)
            ->associate('App\Produit');
        return redirect()->route('boutique.index')->with('success','Le produit a bien été ajouter au panier');    
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
    public function update(Request $request, $rowId)
    {
        
        $data = $request->json()->all();
        $validate = Validator::make($request->all(),[
            'qty'=>'required|numeric|between:1,6'
        ]);

            if($validate->fails()){
                Session::flash('danger','La quantité du produit ne peut pas depasser 6 .');
                return response()->json(['error','cart quatity has not been updated.']);
            }

        Cart::update($rowId,$data['qty']);
        Session::flash('success','La quantité du produit est passer a '. $data['qty']);
        return response()->json(['success','cart quatity has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success','le produit a bien été supprimer');
    }
}
