@extends('master/maitre_admin')
@section('content')

<div class="container">
    <a
        href="{{ route('admin.article.create.article',['id'=>$shop->id]) }}">Nouvelle
        Article</a>
    {{-- url('admin/create/'.$shop->id.'/article') --}}
   

    @isset($message)
        {{-- si ça passe ici c'est que la variable message existe --}}
        <p>Ceci est un message de la plus haute importance de Fire the Coder !</p>
        {{-- ici c'est le message que l'on vient de définir dans la methode
        update --}}
        <p>{{ $message }}</p>
    @endisset
    {{-- <form action="{{url('shop//article/store',['article'=>$article]) }}"
    method="POST">
    @csrf

    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger">supprimer Article</button>
    </form> --}}
    <div>
        <div>
            <h3 style="text-align: center">{{ $shop->nom }}</h3>
            <div class="row div-img">
                <div class="col-lg-8" style="justify-content:center;">
                    
                  <p style="margin-bottom: 0%; margin-top:5%" class="">{{ $shop->description }}</p><br>
                  <p style="margin-top: 5%"><strong>Horaires d'ouvertures :</strong> </p>
                  @foreach($shop ->horaires as $jour)
                          <p style="margin-bottom:0%">
                              {{ $jour->jours }} :
                              @if($jour->fermer)
                                  fermé
                              @else
                                  De {{ $jour->hor_ouverture->format('H\hi')}}
                                  @if($jour->hor_fer_mat) a {{ $jour->hor_fer_mat->format('H\hi')}} @endif
                                  @if($jour->hor_deb_aprem) Et De {{ $jour->hor_deb_aprem->format('H\hi') }} @endif
                                   a {{ $jour->hor_fermeture->format('H\hi')}}
                              @endif
                          </p>
                      
                  @endforeach
                </div>
                <div class="col-lg-4 ">
                    <img src="/{{ $shop->image }}" class="img-fluid" style=" margin-bottom:2rem; margin-top:10%" >
                
                    <p style="margin-top: 2rem"> <strong>Adresse du magasin :</strong> </p>
                  <p>{{ $shop->geolocalisation->adresse }}</p>
                  <p style="margin-top : 2rem;"><strong>
                    Liens externes</strong></p>
                   <a href="{{$shop->site}}" target="__blank"><p style="">{{$shop->site}}</p></a> 
                   <a href="{{ $shop->facebook }}" target="__blank"><p>{{ $shop->facebook }}</p></a> 
                    <a href="{{ $shop->instagram }}" target="__blank"><p>{{ $shop->instagram }}</p></a>    
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
                    <p style="text-align: center"> {{ $article->description_article }}</p>
                    <div class=" column" style="align-items: center">
                        <form action="{{ route('admin.article.delete.article',$article->id) }}"
                            onsubmit="return confirm('Voulez Vous vraiment supprimer cette Article')" ;
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">supprimer Article</button>
                        </form>
                            <a href="{{ url('admin/edit/'.$article->id.'/'.$shop->id.'/article') }}"
                                class="btn btn-success"> Modifier l'article</a>
                    
                    </div>
                    
                </article>
            </div>
        @endforeach
    </div>

    </div>
</div>
</div>

@endsection
