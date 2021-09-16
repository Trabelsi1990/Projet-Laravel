<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // fonction pour afficher les utilisateurs
    public function index()
    {
        
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    // fonction pour afficher le formulaire de modification
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect()->route('admin.users.index');
        }
        
        $roles = Role::all();
        return view('admin.users.Edit',[
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    // fonction pour modifier un utilisateur
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->save();
        return redirect()->route('admin.users.index')->with('update','lutilisateur a été modifier !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    // pouvoir supprimer un utilistauer
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect()->route('admin.users.index');
        }
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')->with('delete','lutilisateur a été supprimer !');

    }
}
