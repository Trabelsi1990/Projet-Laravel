<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Contact as ContactMessage;
use Illuminate\Http\Request;



class Contact_controller extends Controller
{
    // fonction pour la creation du formulaire de contact
    public function create(){
        return view('contact.create');
       
    }
    // fonction enregistre l'envoi d'un mail coté utilisateur
    public function store(Request $request){
    
       
        $validate = $request->validate([
            'nom'=>'required|min:3',
            'email'=>'required|email',
            'sujet'=>'required|between : 3,20',
            'message'=>'required'
        ]);
   
            $contact = ContactMessage::create($validate);

            Mail::to('ali@gmail.fr')
            ->send(new Contact($validate['nom'],$validate['email'],$validate['sujet'],$validate['message']));
            return redirect()->route('contact.confirm'); 
    }
    // fonction pour la confirmation d'envoi du mail
    public function confirm(){
        return view('contact.confirm');
    }
}


