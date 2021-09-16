@extends('master/maitre_admin')
@section('content')
<div class="container">
    <div class="card">
        <form action="{{route('admin.artisan.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Nouvel Artisan</h3>
            @error('nom')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-group">
                <input type="text" name="nom" id="nom" class="form-control" placeholder="nom du createur">
            </div>
            @error('marque')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-group">
                <input type="text" name="marque" id="marque" class="form-control" placeholder="marque">
            </div>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
            <div>
                <textarea name="description" id="description" class="form-control" placeholder="votre description" rows="10"></textarea>
            </div>

            @error('image')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleFormControlFile1">choisissez une image</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            @error('site')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-group">
                <input type="text" name="site" id="site" class="form-control" placeholder="site">
            </div>
            @error('facebook')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-group">
                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="facebook">
            </div>
            @error('instagram')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-group">
                <input type="text" name="instagram" id="instagram" class="form-control" placeholder="instagram">
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>

</div>
@endsection