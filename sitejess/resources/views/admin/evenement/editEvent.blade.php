@extends('master/maitre')
@section('content')
<div class="container">
    <form
        action="{{ route('admin.evenement.update',['evenement' => $events]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nom">Nom d'evenement</label>
            <input type="text" id="nom" name="nom" placeholder="nom evenement" value="{{ $events->nom }}"><br>

            <label for="lieu">lieu</label>
            <input type="text" id="lieu" name="lieu" placeholder="lieu de l'evenement"
                value="{{ $events->lieu }}"><br>

            <label for="date">date</label>
            <input type="date" id="date" name="date" placeholder="date de l'evenement"
                value="{{ $events->date?$events->date->format('Y-m-d'):'' }}"><br>

            <label for="heure">heure</label>
            <input type="time" id="heure" name="heure" placeholder="l'heure de l'evenement"
                value="{{ $events->heure?$events->heure->format('H:m'):'' }}"><br>

            <label for="prix">prix</label>
            <input type="text" id="prix" name="prix" placeholder="Prix" value="{{ $events->prix }}"><br>

            <div class="form-group">
                <label for="exampleFormControlFile1">choisir une image</label>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="votre description"
                rows="10">{{ $events->description }}</textarea><br>
            <div>
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
</div>
@endsection
