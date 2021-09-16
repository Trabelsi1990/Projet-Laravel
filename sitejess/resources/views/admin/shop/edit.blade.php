@extends('master/maitre_admin')
@section('content')
{{-- form to edit Shop --}}
<div class="container">
  <form action="{{route('admin.shop.update',['shop' => $shop])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>Modifier Magasin</h1>
    @isset($message)
    {{-- si ça passe ici c'est que la variable message existe --}}
    <p>Ceci est un message de la plus haute importance de The Fire Coder !</p>
    {{-- ici c'est le message que l'on vient de définir dans la methode
        update --}}
    <p>{{ $message }}</p>
    @endisset
    <label for="cate">Categorie</label>
    <select name="categorie" id="cate">
      <option value="">Selectionnez une categorie</option>
      @if($shop->categorie == "shop")
      <option value="shop" selected>Shop</option>
      @else
      <option value="shop">Shop</option>
      @endif

      @if($shop->categorie == "restaurant")
      <option value="restaurant" selected>Restaurant</option>
      @else
      <option value="restaurant" >Restaurant</option>
      @endif

      @if($shop->categorie=="bars")
      <option value="bars" selected>Bars</option>
      @else
      <option value="bars">Bars</option>
      @endif
      
      @if($shop->categorie == "coffee-time")
      <option value="coffee-time" selected>Coffe Time</option>
      @else
      <option value="coffee-time">Coffe Time</option>
      @endif
    </select>

    <div class="form-group" >
      <label for="nom">Nom Du Magasin</label>
    <input type="text" name="nom" class="form-control" placeholder="nom du magasin" value="{{$shop->nom}}" 
    required>

      <label for="description">Description du Magasin</label>
        <textarea name="description" class="form-control" placeholder="votre description" rows="10" 
       >{{$shop->description}}
        </textarea>
  
  
        <label for="exampleFormControlFile1">Choisissez votre image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1"  >
  
   
     <label for="adresse">Adresse</label>
     <input type="adresse" name="adresse" id="adresse" class="form-control" placeholder="l'adresse du magasin" value="{{$shop->geolocalisation->adresse}}">
    
    <label for="site">Site du Magasin</label>
    <input type="text" name="site" id="site" class="form-control" placeholder="site du magasin" value="{{$shop->site}}">

     <label for="facebook">facebook</label>
     <input type="text" name="facebook" id="facebook" class="form-control" placeholder="page Facebook" value="{{$shop->facebook}}">

     <label for="instagram">instagram</label>
     <input type="text" name="instagram" id="instagram" class="form-control" placeholder="page instagram" value="{{$shop->instagram}}">

   @foreach($shop->horaires as $jour )
    <div class="row">
      <div class="d-flex col-4 " >
        <div>
          <label for="{{$jour->jours}}">{{$jour->jours}} :</label>
        </div>
      <input type="time"  name="{{$jour->jours}}[hor_ouverture]" id="{{$jour->jours}}" class="form-control" value="{{$jour->hor_ouverture?$jour->hor_ouverture->format('H:m') : ''}}">
      <input type="time"  name="{{$jour->jours}}[hor_fer_mat]"   id="{{$jour->jours}}" class="form-control" value="{{$jour->hor_fer_mat ?$jour->hor_fer_mat->format('H:m') : ''}}">
      <input type="time"  name="{{$jour->jours}}[hor_deb_aprem]" id="{{$jour->jours}}" class="form-control" value="{{$jour->hor_deb_aprem ?$jour->hor_deb_aprem->format('H:m') : ''}}">
      <input type="time"  name="{{$jour->jours}}[hor_fermeture]" id="{{$jour->jours}}" class="form-control" value="{{$jour->hor_fermeture?$jour->hor_fermeture->format('H:m') : ''}}">
      <input type="checkbox" name="{{$jour->jours}}[fermer]" value="1" @if ($jour->fermer) checked @endif>
      </div>
   </div>
  {{-- </div> --}}
   @endforeach
   <div class="form-group">
      <button type="submit" class="btn btn-outline-success">Enregistrer</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>
</div>
@endsection