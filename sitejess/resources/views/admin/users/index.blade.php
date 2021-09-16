@extends('layouts.app')

@section('content')
 @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}"></a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                              <a class="dropdown-item" href="{{route('admin.users.index')}}">listes de mes utilisateurs</a> 
                              <a href="{{route('admin.afficheCarou')}}">Acceuil</a>  
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Liste des Utilisateurs </div>
                
                <div class="card-body">
                    @if(session('delete'))
                        <div class="alert alert-success">
                            {{ session('delete') }}
                        </div>
                    @endif
                    @if(session('update'))
                        <div class="alert alert-success">
                            {{ session('update') }}
                        </div>
                    @endif      
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                              <tr>
                              <th scope="row">{{$user->id}}</th>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                              <td>
                                  @can('edit-users')
                              <a href="{{route('admin.users.edit', $user->id)}}"> <button class="btn btn-primary">Editer</button></a>
                              @endcan
                              @can('delete-users')   
                              
                                  <form action="{{route('admin.users.destroy', $user->id)}}" 
                                    method="POST" class="d-inline"
                                    onsubmit= "return confirm('voulez vous vraiment supprimer cette utilisateur ?')";>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                  </form>
                                  @endcan
                              </td>
                              </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
