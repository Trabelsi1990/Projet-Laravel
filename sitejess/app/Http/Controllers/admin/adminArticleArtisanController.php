<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artisan;
use App\Article;

class adminArticleArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cette fonction permet d'afficher les articles des créateurs locaux coté admin
        $articles = Article::all();
        return view('admin/artisan/artisanShowAdmin',compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // cette fonction permet d'afficher le formulaire d'ajout d'un article des créateurs locaux
        return view('admin/artisan/create_article',[
            'artisan'=>$request->artisan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // cette fonction permet d'enregitrer l'article ajouté
        $validation = $request->validate([
            'titre_article'=>'required',
            'description_article'=>'required',
            'image_article'=>'required|file|max:5000|image'
        ]);
        $article = new Article();
        $article->titre_article = request('titre_article');
        $article->description_article = request('description_article');
        $article->image_article = request('image_article')->store('uploads');
        $article->artisan_id = $request->artisan;
       
        $article->save();
        return redirect()->route('admin.artisan.index')->with('create','votre article a été ajouté');
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
        // fonction pour l'affichage du formulaire de modification d'un article
        $article = Article::find($id);
       return view('admin/artisan/edit_article')->with('article', $article); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // fonction pour la modification d'un article
        $article->update($request->all()); // ça mets à jour l'enregistrement 
        if ($request->has('image_article')) {
            $article->image_article = request('image_article')->store('uploads');
            $article->save();
        }
        return redirect()->route('admin.artisan.index')->with('modif', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  variable $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // fonction permet la suppression d'un article
        $article->delete();
        return redirect()->route('admin.artisan.index')->with('delete', 'votre Article a bien été supprimé !');
    }
}
