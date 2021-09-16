<?php

namespace App\Http\Controllers;

use App\Order;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<=0){
            return redirect()->route('boutique.index');
        }
       // lien pour effectue le paiement
       Stripe::setApiKey('sk_test_51H5VjWHsh7ijhM2kGKNG1Bat4F6SalPEbdryYN98JUxM2bhP5OVQLlgtdaOkzBjt3wzd0A8MEI1IrBCw3MSzYAly00JwqRWW86');
       //intention de paiement
       $intent = PaymentIntent::create([
        'amount' => round(Cart::total()),
        'currency' => 'eur',
        // Verify your integration in this guide by including this parameter
        'metadata' => ['integration_check' => 'accept_a_payment',
            ],
      ]);
        $clientSecret = Arr::get($intent, 'client_secret');
        return view('checkout/index',[
            'clientSecret'=>$clientSecret,
        ]);
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
    // fonction pour enregistrer la commande apres le succes du payement dans notre bdd
    public function store(Request $request)
    {
        
        $data = $request->json()->all();
  
        $order = new Order();
        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->montant = $data['paymentIntent']['amount'];
        $order->payment_created_at = (new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s');

        $produits = [];
        $i = 0;
        foreach(Cart::content() as $produit){
            $produits ['produit_'.$i][] = $produit->model->title;
            $produits ['produit_'.$i][] = $produit->model->price;
            $produits ['produit_'.$i][] = $produit->qty;
            $i++;
        }
        $order->produits = serialize($produits);
        $order->user_id = Auth::user()->id;
        $order->save();

        if($data['paymentIntent']['status']=== 'succeeded'){
             Cart::destroy();
             Session::flash('success','votre commande a été traitée avec succès');
             return response()->json(['succeeded'=> 'payement Intent succeeded']);
        }else{
            return response()->json(['error'=> 'payement Intent not succeeded']);
        } 
    }

    public function thankyou(){
        return Session::has('success') ? view('checkout/merci') : redirect()->route('boutique.index');
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
