<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Magasin;
use App\Article;
use App\Geolocalisation;
use App\Horaire;


class adminMagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        //fonction pour l'affichage de tout les magasins par catégorie

            if($request->has('categorie')){
                $cate = $request->categorie;
                $shops = Magasin::where('categorie',$cate)->get();
                $categorie = $request->categorie;
            }
            else{
                $shops = Magasin::all();
                $categorie = 'all';
            }
            return view('/admin/shop/shop_admin',compact('shops','categorie'));
             
    }

    public function create()
    {
        // fonction permet l'affichage du formulaire de création d'un magasin
    

        $week=['lundi','mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
        return view('/admin/shop/create',[
            'jours'=>$week,  
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Magasin $shop)
    {
        // fonction pour l'enregistrement du magasin

        // validation des données avant l'enregistrement
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|file|max:5000|image',
            'categorie'=>'required|in:shop,restaurant,bars,coffee-time',
            'adresse' => 'required',
            // 'site'=>'required',
            // 'facebook' => 'required|min:10',
            // 'instagram' => 'required|min:10'
        ]);
        // Création du magasin
        $shop = new Magasin();
        $shop->nom = request('nom');
        $shop->description = request('description');
        $shop->image = request('image')->store('uploads');
        $shop->site = request('site');
        $shop->facebook= request('facebook');
        $shop->instagram= request('instagram');
        $shop->categorie = request('categorie');
        $shop->inCaroussel = false;
        $shop->save();

        // Création de la géolocalisation
        $geoloc = new Geolocalisation();
        $geoloc->adresse = request('adresse');
        $geoloc->longitude = request('longitude');
        $geoloc->latitude = request('latitude');
        // Association de la géoloc avec le magasin
        $geoloc->magasin_id = $shop->id;
        $geoloc->save();

        
        $week = [
             'lundi','mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'
        ];
        foreach ($week as $day) {
             $horaire = new Horaire();
             $horaire->jours = $day;
             $horaire->magasin_id = $shop->id;

                $horaire->hor_ouverture = request($day)['hor_ouverture'];
                $horaire->hor_fer_mat =   request($day)['hor_fer_mat'];
                $horaire->hor_deb_aprem = request($day)['hor_deb_aprem'];
                $horaire->hor_fermeture = request($day)['hor_fermeture'];
                
             if(request()->has($day . '.fermer')){
                $horaire->fermer =    request($day)['fermer'];
                }
                else{
                    $horaire->fermer = false;
                }
              // association des horraires avec le magasin
             $horaire->save();
            }
        return redirect()->route('admin.shop.index')->with('create', 'votre magasin a bien été enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // fonction pour afficher les details du magaisn ainsi que ses articles
    public function show($magasin_id)
    {
        $shop = Magasin::findOrFail($magasin_id);
        return view('/admin/shop/shop_show_admin', ['shop' =>$shop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // fonction pour le formulaire de modification du magasin
    public function edit($magasin_id)
    {
        $ali=['lundi','mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
        $shop = Magasin::find($magasin_id);
        return view('admin/shop/edit',compact('shop'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // fonction pour enregistrer la modification
    public function update(Request $request, Magasin $shop,Geolocalisation $geoloc)
    {
         $request->validate([
            'nom'=>'required',
            'description'=>'required', 
        ]);
        // la condition fait que si ya une modification sur la categorie
        if($shop->categorie!=$request->categorie){
            // recuperation de la modification de la categorie
            $shop->categorie= $request->categorie;
            $shop->save(); 
        }
        else{
            // ça mets à jour l'enregistrement
           $shop->update($request->all());
           $shop->save();  
        }
         
        if ($request->has('image')) {
            $shop->image = request('image')->store('uploads');
            $shop->save();
        }
        
        foreach ($shop->horaires as $horaire) 
        {
            if(request()->has($horaire->jours . '.fermer')){
                $horaire->fermer =    request($horaire->jours)['fermer'];
                }
                else{
                    $horaire->fermer = false;
                }
                
            $horaire->update([
                'hor_ouverture' => request($horaire->jours)['hor_ouverture'],
                'hor_fer_mat' =>  request($horaire->jours)['hor_fer_mat'],
                'hor_deb_aprem' => request($horaire->jours)['hor_deb_aprem'],
                'hor_fermeture' => request($horaire->jours)['hor_fermeture'],   
            ]);   
            $horaire->save();
        }
        return redirect()->route('admin.shop.index')->with('update', 'Votre magasin a été modifié'); }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magasin $shop)
    {
        // fonction pour la supression d'un magasin et tout se qui est relié a lui 
        // exemple : les jours et les horaires l'article aussi qui sont dans d'autres table de ma bdd

        $shop->horaires()->delete();
        $shop->geolocalisation()->delete();
        $shop->articles()->delete();
        $shop->delete();
        return redirect()->route('admin.shop.index')->with('delete', 'Le magasin a été supprimé!'); 
    }

    
// le crud pour les Articles !!!!!!
    public function createArticle($id)
    {
        return view('admin/shop/create_article', [
            'id' => $id
        ]);
    }
// Méthode pour l'enregistrement des articles
    public function storeArticle(Request $request,$magasin_id)
    {
        $request->validate([
            'titre_article' => 'required|min:5',
            'description_article' => 'required|min:10',
            'image_article' => 'required|file|max:5000|image',
        ]);
        $article = new Article();
        $article->titre_article = request('titre_article');
        $article->description_article = request('description_article');
        $article->image_article = request('image_article')->store('uploads');
        $article->magasin_id = $magasin_id;
        $article->save();
        return redirect()->route('admin.shop.index')->with('create_article', 'votre Article a bien été enregistré !');
        
    }
    // fonction pour le formulaire de l'article
    public function editArticle($id)
    {
        $article = Article::find($id);
        return view('/admin/shop/edit_article')->with('article', $article);
    }
    // fonction pour enregistrer la modification
    public function updateArticle(Request $request, Article $article)
    {
        $article->update($request->all()); // ça mets à jour l'enregistrement 
        if ($request->has('image_article')) {
            $article->image_article = request('image_article')->store('uploads');
            $article->save();
        }
        return redirect()->route('admin.shop.index')->with('modif', 'Votre article a bien été modifié!');
    }
    // fonction pour la supression d'un seul article sans pour autant supprimer le magasin
    public function destroyArticle(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.shop.index')->with('delete', 'votre Article a bien été supprimé !');
    }
}
