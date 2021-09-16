@extends('master/maitre_admin')
@section('content')
<div class="container">
    <h3>Modifier un artisan</h3>
    <div>
    <form action="{{route('admin.artisan.update',['artisan'=>$artisan])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @error('nom')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-group">
            <input type="text" name="nom" id="nom" class="form-control" placeholder="nom du createur" value="{{$artisan->nom}}">
            
            @error('marque')
                <p>{{ $message }}</p>
            @enderror
           
                <input type="text" name="marque" id="marque" class="form-control" placeholder="marque" value="{{$artisan->marque}}">
           
            @error('description')
                <p>{{ $message }}</p>
            @enderror
           
                <textarea name="description" id="description" class="form-control" placeholder="votre description" rows="10" >{{$artisan->description}}</textarea>
            

            @error('image')
                <p>{{ $message }}</p>
            @enderror
           
                <label for="exampleFormControlFile1">choisissez une image</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
           
            @error('site')
                <p>{{ $message }}</p>
            @enderror
           
                <input type="text" name="site" id="site" class="form-control" placeholder="site" value="{{$artisan->site}}">
         
            @error('facebook')
                <p>{{ $message }}</p>
            @enderror
         
                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="facebook" value="{{$artisan->facebook}}">
       
            @error('instagram')
                <p>{{ $message }}</p>
            @enderror
          
                <input type="text" name="instagram" id="instagram" class="form-control" placeholder="instagram" value="{{$artisan->instagram}}">
            </div>
            <button type="submit" class="btn btn-success">Modifier</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
@endsection