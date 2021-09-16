@extends('master/maitre_admin')
@section('content')
<div class="container">
    <a
        href="{{ route('admin.article.create',['artisan'=>$artisan->id]) }}">Ajouter
        Article</a>

    <div>
        <div>
            <h3 style="text-align: center">{{ $artisan->nom }}</h3>
            <div class=" div-img ">
                <div class=" div-ext-art" >
                    <p>{{ $artisan->marque }}</p>
                    <p>{{ $artisan->description }}</p>

                    <h5 style="margin-bottom: 0%">Les liens externes</h5><br>
                    <a href="{{ $artisan->site }}" style="margin-bottom: 0%; margin-top:0%">
                        <p style="margin-bottom: 0%; margin-top:0%" target="_blank">{{ $artisan->site }}</p><br>
                    </a>
                    <a href="{{ $artisan->facebook }}">
                        <p style="margin-top: 0%; margin-bottom:0%" target="_blank">{{ $artisan->facebook }}</p>
                    </a> <br>
                    <a href="{{ $artisan->instagram }}">
                        <p style="margin-top: 0%; margin-bottom:15%" target="_blank">{{ $artisan->instagram }}</p>
                    </a>


                </div>
                <img src="{{ url($artisan->image) }}" class="img-art" alt="article-image" >
            </div>



        </div>

        <h3 style="margin-bottom: 10%; margin-top:10%; text-align:center">Les Articles</h3>
      <div class="row">
        @foreach($artisan->articles as $article)
            
                <div class="col-md-6 col-sm-12 col-lg-4">
                    <h5 style="text-align: center;">{{ $article->titre_article }}</h5>
                    <img src="{{ url($article->image_article) }}" alt="article-image" width="50%"
                        class="rounded mx-auto d-block">
                    <p style="text-align: center;">{{ $article->description_article }}</p>
                    <div class=" column" style="align-items: center">
                        <form action="{{ route('admin.article.destroy',$article->id) }}"
                            onsubmit="return confirm('Voulez Vous vraiment supprimer cette article')";
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">supprimer Article</button>
                        </form>
                        <a href="{{ route('admin.article.edit',$article->id) }}"
                            class="btn btn-success"> Modifier l'article</a>
                    </div>
                </div>
            
        @endforeach
    </div>
  </div>
</div>
@endsection
