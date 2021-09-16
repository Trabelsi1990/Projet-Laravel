@extends('master/maitre')
@section('content')
{{-- blade des articles de chaque Magasin --}}
<div class="container">
    <div>
        <div>
            <h3 style="text-align: center">{{ $shop->nom }}</h3>
            <div class="row div-img">
                <div class="col-lg-8" style="justify-content:center;">
                    
                  <p style="margin-bottom: 0%; margin-top:5%" class="">{{ $shop->description }}</p><br>
                  <p style="margin-top: 5%"> <strong>Horaire d'ouverture :</strong> </p>
                  @foreach($shop ->horaires as $jour)
                          <p style="margin-bottom:0%">
                              {{ $jour->jours }} :
                              @if($jour->fermer)
                                  fermé
                              @else
                                  {{ $jour->hor_ouverture->format('H:m')}}-
                                  @if($jour->hor_fer_mat){{ $jour->hor_fer_mat->format('H:m')}} @endif
                                  @if($jour->hor_deb_aprem){{ $jour->hor_deb_aprem->format('H:m') }} @endif
                                  {{ $jour->hor_fermeture->format('H:m')}}
                              @endif
                          </p>
                  @endforeach
                </div>
                <div class="col-lg-4 ">
                    <img src="/{{ $shop->image }}" class="img-fluid " style=" margin-bottom:10%; margin-top:10%" >
                    <p style="margin-top: 5%"> <strong>L'adresse du magasin :</strong> </p>
                  <p>{{ $shop->geolocalisation->adresse }}</p>
                    <p> {{ $shop->site }} </p>
                    <p>{{ $shop->facebook }}</p>
                    <p>{{ $shop->instagram }}</p>   
                </div>
            </div>
        </div>
        <h2 style="margin-top: 10%; text-align: center">Les Articles</h2>
        <div class="row">
        @foreach($shop->articles as $article)
            <div class="column col-4">
                <article>
                    <h4 style="margin-top: 10%; text-align: center ">{{ $article->titre_article }}</h4>
                    <img class="img-fluid rounded mx-auto d-block" src="{{ url($article->image_article) }}" width="320px">
                    <p>{{ $article->description_article }}</p>
                </article>
            </div>
        @endforeach
        </div>
    </div>
</div>
</div>

@endsection
