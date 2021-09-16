@extends('master/maitre_admin')
@section('content')
{{-- formulaire d'ajout des magasins --}}
<div class="container">
  <form action="{{route('admin.shop.store')}}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <h1>Nouveau Magasin</h1>
    <label for="cate">Categorie</label>
    <select name="categorie" id="cate">
      <option value="">Selectionnez une categorie</option>
      <option value="shop">Shop</option>
      <option value="restaurant">Restaurant</option>
      <option value="bars">Bars</option>
      <option value="coffee-time">Coffe Time</option>
    </select>

    @error('nom')
    <p>{{ $message }}</p>
    @enderror
    <div class="form-group">
        <input type="text" name="nom" class="form-control" placeholder="nom du magasin">
    </div>
    @error('description')
    <p>{{ $message }}</p>
    @enderror
   
    <textarea name="description" class="form-control" placeholder="votre description" rows="10"></textarea>
   

   @error('image')
    <p>{{ $message }}</p>
    @enderror
   <div class="form-group">
    <label for="exampleFormControlFile1">choisissez une image</label>
    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    @error('adresse')
    <p>{{ $message }}</p>
    @enderror
   
     <label for="adresse">Adresse</label>
     <input type="adresse" name="adresse" id="adresse" class="form-control" placeholder="l'adresse du magasin">

     <label for="site">Site du Magasin</label>
     <input type="text" name="site" id="site" class="form-control" placeholder="site du magasin">
    
     <label for="facebook">facebook</label>
     <input type="text" name="facebook" id="facebook" class="form-control" placeholder="page Facebook">

     <label for="instagram">instagram</label>
     <input type="text" name="instagram" id="instagram" class="form-control" placeholder="page instagram">
   
    @foreach($jours as $jour )
    <div class="row">
      @error($jour)
    <p>{{ $message }}</p>
    @enderror
    <div class="d-flex col-4" >
      <label for="{{$jour}}">{{$jour}} </label>
      <input type="time"  name="{{$jour}}[hor_ouverture]" id="{{$jour}}" class="form-control" >
      <input type="time"  name="{{$jour}}[hor_fer_mat]"   id="{{$jour}}" class="form-control" >
      <input type="time"  name="{{$jour}}[hor_deb_aprem]" id="{{$jour}}" class="form-control" >
      <input type="time"  name="{{$jour}}[hor_fermeture]" id="{{$jour}}" class="form-control" >
      <input type="checkbox" name="{{$jour}}[fermer]" value="1"> fermer
   </div>
     </div>
   @endforeach

<div > 
  <button type="submit" class="btn btn-success">Enregistrer</button>
  <button type="reset" class="btn btn-danger">Reset</button>
</div> 
</form>
</div>
@endsection