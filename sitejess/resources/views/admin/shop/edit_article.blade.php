@extends('master/maitre_admin')
@section('content')
{{-- form to edit article --}}
<form action="{{route('admin.article.update.article',['article'=>$article->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>Modifier Article</h1>
    @isset($message)
    {{-- si ça passe ici c'est que la variable message existe --}}
    <p>Ceci est un message de la plus haute importance de Fire the Coder !</p>
    {{-- ici c'est le message que l'on vient de définir dans la methode
        update --}}
    <p>{{ $message }}</p>
    @endisset

    <div class="form-group" >
    <input type="text" name="titre_article" class="form-control" placeholder="titre article" 
    value="{{$article->titre_article}}"
     required>
     </div>
    {{-- <div class="form-group">
        <input type="text" name="adresse" class="form-control" placeholder="adresse du magasin">
    </div> --}}
   <div class="form-group">
        <textarea name="description_article" class="form-control" placeholder="votre description" rows="10" 
         value="{{$article->description_article}}">
         {{$article->description_article}}</textarea>
   </div>
   <div class="form-group">
        <label for="exampleFormControlFile1">Choisissez une image</label>
        <input name="image_article" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
   <div class="form-group">
      <button type="submit" class="btn btn-outline-success">Enregistrer</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>
@endsection