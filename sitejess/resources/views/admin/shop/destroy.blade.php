@extends('master/maitre_admin')
@section('content')
{{-- formulaire de suppression d'un magasin --}}
<form action="{{route('shop.destroy',['shop' => $shop])}}" method="POST">
    @csrf
   
    @method('DELETE')
    <h1>Supprimer Magasin</h1>
    @isset($message)
    {{-- si ça passe ici c'est que la variable message existe --}}
    <p>Ceci est un message de la plus haute importance de Fire the Coder !</p>
    {{-- ici c'est le message que l'on vient de définir dans la methode
        update --}}
    <p>{{ $message }}</p>
    @endisset
</form>
@endsection
