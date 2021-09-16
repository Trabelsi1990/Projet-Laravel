@extends('master/maitre_admin')
@section('content')
{{-- form to edit A propos --}}
<h1>Modifier A propos</h1>

<form action="{{route('admin.A_propos.update',$propo )}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @isset($message)
    {{-- si ça passe ici c'est que la variable message existe --}}
    <p>Ceci est un message de la plus haute importance de Fire the Coder !</p>
    {{-- ici c'est le message que l'on vient de définir dans la methode
        update --}}
    <p>{{ $message }}</p>
    @endisset
<div class="form-group">
    <label for="exampleFormControlFile1">choisissez une image</label>
    <input name="image1" type="file" class="form-control-file" id="exampleFormControlFile1">
</div>

<div>
<textarea name="description" class="form-control" placeholder="votre description" rows="10" value="{{$propo->description}}"></textarea>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">choisissez une image</label>
    <input name="image2" type="file" class="form-control-file" id="exampleFormControlFile1">
</div>

<div>
<textarea name="description2" class="form-control" placeholder="votre description" rows="10" 
value="{{$propo->description2}}"></textarea>
</div>

<div class="form-group">
    <input type="text" name="nom_photographe" class="form-control" placeholder="nom du photographe" 
    value="{{$propo->nom_photographe}}" required>
</div>

<div class="form-group">
<label for="exampleFormControlFile1">choisissez une image</label>
<input name="image_photographe" type="file" class="form-control-file" id="exampleFormControlFile1">
</div>

<div>
<textarea name="description_photographe" class="form-control" placeholder="votre description" rows="10"
value="{{$propo->description_photographe}}" required></textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-outline-success">Enregistrer</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </div>
</form>
@endsection





{{-- value="{{$shop->nom}} --}}