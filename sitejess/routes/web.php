<?php

use App\Http\Controllers\admin\adminArticleArtisanController;
use App\Http\Controllers\admin\adminMagasinController;
use App\Http\Controllers\Magasin_controller;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Magasin;
use App\Artisan;
use App\Evenement;
use App\Mail\Contact;
use Gloudemans\Shoppingcart\Facades\Cart;
use PHPUnit\Runner\Hook;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',function(Request $request){
    return redirect()->route('caroussel.index');
});


//Route::group([],function(){


// Ca on garde
// mes routes pour l'ajout des articles
 Route::get('/create/{id_magasin}/article', 'Magasin_controller@createArticle');
 Route::post('/shop/{id_magasin}/article/store', 'Magasin_controller@storeArticle');
// Route pour la modification de l'article
 Route::get('/edit/{id_article}/{id_magasin}/article', 'Magasin_controller@editArticle');
 Route::put('/shop/{article}/article/update', 'Magasin_controller@updateArticle')->name('update_article');
 // route pour la suppression des articles
 Route::delete('/shop/{article}/article/delete','Magasin_controller@destroyArticle')->name('delete_article');

 // route pour les categorie
 
// c'est ton controlleur qui va encaisser toutes les routes
Route::resource('/shop','Magasin_controller');

// c'est ton controlleur qui va encaisser toutes les routes pour l'ajout de la categorie a propos de nous
Route::resource('/A_propos','Propo_controller');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Routes pour Artisan
Route::get('artisan','ArtisanController@index')->name('artisan.index');
Route::get('artisan/{id}','ArtisanController@show')->name('artisan.show');

// 2 route pour le formulaire de contact :
        Route::get('contact/create', 'Contact_controller@create')->name('contact.formulaire');
        Route::post('contact/store', 'Contact_controller@store')->name('contact.store');
        Route::get('contact/confirm', 'Contact_controller@confirm')->name('contact.confirm');
   
// route search
Route::get('search','SearchController@search')->name('shop.search');
// routes pour les evenements
Route::resource('/evenement','EvenementController');

// route pour la boutique
Route::resource('/boutique','ProduitController');
Route::get('/boutique/{slug}','ProduitController@show')->name('product.show');

Route::group(['middleware'=>['auth']],function(){
    // route pour les cartes
Route::get('/mon-panier','CartController@index')->name('cart.index');
Route::post('/panier/ajouter','CartController@store')->name('cart.store');
Route::patch('/panier/{rowId}','CartController@update')->name('cart.update');
Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');
});
Route::group(['middleware'=>['auth']],function(){
// routes des checkout
Route::get('/paiement','CheckoutController@index')->name('checkout.index');
Route::post('/paiement','CheckoutController@store')->name('checkout.store');
Route::get('/merci','CheckoutController@thankyou')->name('checkout.merci');
});


// Route pour l'affichage du caroussel
Route::get('/accueil','CarousselController@affichecarou')->name('caroussel.index');

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
        Route::resource('users','UsersController');
        Route::resource('/shop','adminMagasinController');
        Route::resource('/evenement','adminEventController');
        Route::resource('/A_propos','adminPropoController');
        Route::resource('/contact','adminContactController');
        Route::resource('/article','adminArticleArtisanController');
        Route::get('contact/confirm','adminContactController@confirm')->name('contact.confirm');
        Route::resource('/caroussel','AdminCarousselController');
        Route::get('/',function(){
            return view('master.maitre_admin');
        });
        Route::get('/create/{id}/article', 'adminMagasinController@createArticle')->name('article.create.article');
        Route::post('/shop/{id}/article/store', 'adminMagasinController@storeArticle')->name('article.store.article');
       // Route pour la modification de l'article
        Route::get('/edit/{id}/{magasin_id}/article', 'adminMagasinController@editArticle')->name('article.edit.article');
        Route::put('/shop/{article}/article/update', 'adminMagasinController@updateArticle')->name('article.update.article');
        // route pour la suppression des articles
        Route::delete('/shop/{article}/article/delete','adminMagasinController@destroyArticle')->name('article.delete.article');
        Route::resource('/artisan','adminArtisanController');
        Route::get('/welcome','AdminCarousselController@affichecarou')->name('afficheCarou');
        Route::get('/search','SearchAdminController@searchAdmin')->name('search.search');
    
});