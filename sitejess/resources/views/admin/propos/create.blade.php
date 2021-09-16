@extends('master/maitre_admin')
@section('content')
{{-- form to add Shop --}}
<form action="{{route('admin.A_propos.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Nouveau A propos</h1>
    @error('image1')
    <p>{{ $message }}</p>
    @enderror
    <div class="form-group">
        <label for="exampleFormControlFile1">choisissez une premiere image</label>
        <input name="image1" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    @error('description')
    <p>{{ $message }}</p>
    @enderror
   <div>
    <textarea name="description" class="form-control" placeholder="votre description" rows="10"></textarea>
   </div>
   @error('nom_fondatrice')
   <p>{{ $message }}</p>
   @enderror
   <div class="form-group">
       <input type="text" name="nom_fondatrice" class="form-control" placeholder="nom de la fondatrice">
   </div>
   @error('image2')
    <p>{{ $message }}</p>
    @enderror
    <div class="form-group">
        <label for="exampleFormControlFile1">choisissez une deuxieme image</label>
        <input name="image2" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    @error('description2')
    <p>{{ $message }}</p>
    @enderror
   <div>
    <textarea name="description2" class="form-control" placeholder="votre description" rows="10"></textarea>
   </div>
    @error('nom_photographe')
    <p>{{ $message }}</p>
    @enderror
    <div class="form-group">
        <input type="text" name="nom_photographe" class="form-control" placeholder="nom du photographe">
    </div>
    @error('image_photographe')
    <p>{{ $message }}</p>
    @enderror
   <div class="form-group">
    <label for="exampleFormControlFile1">choisissez l'image du photographe </label>
    <input name="image_photographe" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    @error('description_photographe')
    <p>{{ $message }}</p>
    @enderror
   <div>
    <textarea name="description_photographe" class="form-control" placeholder="votre description" rows="10"></textarea>
   </div>
   
   
<div >
  <button type="submit" class="btn btn-success">Enregistrer</button>
  <button type="reset" class="btn btn-danger">Reset</button>
</div>  
</form>
@endsection