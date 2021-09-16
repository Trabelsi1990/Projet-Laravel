@extends('master/maitre_admin')
@section('content')
{{-- formulaire d'ajout des articles--}}
<form action="{{route('admin.article.store.article',['id'=>$id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Nouvel Article</h1>
    <div class="form-group">
        <input type="text" name="titre_article" class="form-control" placeholder="titre de l'article ">
    </div>

<div>
<textarea name="description_article" class="form-control" placeholder="votre description" rows="10"></textarea>
</div>
<div class="form-group">
<label for="exampleFormControlFile1">Choisissez votre image</label>
<input name="image_article" type="file" class="form-control-file" id="exampleFormControlFile1">
</div> 
    <div >
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>  
      </form>
      @endsection