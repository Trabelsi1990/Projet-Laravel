@extends('master/maitre')
@section('content')
<div class="container">

    {{-- <div>
        <div>
            <h3 style="text-align: center">{{ $artisan->nom }}</h3>
            <div class="d-flex div-img">
                <div class="d-flex flex-column" style="justify-content:center;">
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
                <img src="{{ url($artisan->image) }}" alt="article-image" width="50%">
            </div>

        </div>
        <div class="div-img-art">
            <h3 style="margin-bottom: 10%; margin-top:10%; text-align:center">Les Articles</h3>
            @foreach($artisan->articles as $article)
                <h5 style="text-align: center;">{{ $article->titre_article }}</h5>
                <p>{{ $article->id }}</p>
                <img src="{{ url($article->image_article) }}" alt="article-image" width="50%"
                    class="rounded mx-auto d-block">
                <p style="text-align: center;">{{ $article->description_article }}</p>
            @endforeach
        </div>
    </div> --}}
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
                </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
