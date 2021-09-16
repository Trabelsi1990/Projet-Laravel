@extends('master/maitre_admin')
@section('content')

<div class="container">
    <div class="row">
        @foreach($mag as $shop)
            <div class="col-4 card">
                <img src="{{ url($shop->image) }}" class="card-img-top " alt="image">
                <div class="card-body">
                    <h3><strong><a
                                href="{{ url('admin/shop/' . $shop->id) }}">{{ $shop->nom }}</a></strong>
                    </h3>
                    <p class="text-truncate">{{ $shop->description }}</p>
                    <p> {{$shop->categorie}}</p>
                    <p class="card-text"><small class="text-muted">Ajouter le :
                            {{ $shop->created_at->format('d/m/y') }}</small></p>
                </div>
            </div>
        @endforeach


        @foreach($eve as $event)

            <div class="col-4 card">
                <img src="{{ url($event->image) }}" class="card-img-top " alt="image">
                <div>
                    <h3><strong><a
                                href="{{ url('admin/evenement/'.$event->id) }}">{{ $event->nom }}</a></strong>
                    </h3>
                    <p class="text-truncate">{{ $event->description }}</p>
                    <p class="card-text"><small class="text-muted">Ajouter le :
                            {{ $event->created_at->format('d/m/y') }}</small></p>
                </div>

            </div>
        @endforeach

        @foreach($art as $artisan)

            <div class="col-4 card">
                <img src="{{ url($artisan->image) }}" class="card-img-top " alt="image">
                <div>
                    <h3><strong><a
                                href="{{ url('admin/artisan/'.$artisan->id) }}">{{ $artisan->nom }}</a></strong>
                    </h3>
                    <p class="text-truncate">{{ $artisan->description }}</p>
                    <p class="card-text"><small class="text-muted">Ajouter le :
                            {{ $artisan->created_at->format('d/m/y') }}</small></p>
                </div>

            </div>
        @endforeach

        @foreach($pro as $produit)


            <div class="card-form m-0  col-4">
                <div class="card">
                    <img src="{{ $produit->image }}" alt="image" class="card-img-top">
                    <div class="card-body">
                        <h3><strong class="">World</strong></h3>
                        <h5 class="card-title">{{ $produit->title }}</h5>
                        <div class=" card-text">
                            <p> <small
                                    class="text-muted">{{ $produit->created_at->format('d/m/y') }}</small>
                            </p>
                        </div>
                        <p class="card-text">{{ $produit->subtitle }}</p>
                        <strong class="card-text">{{ $produit->getPrice() }}</strong><br>
                        <a href="{{ route('boutique.show',$produit->slug) }}"
                            class="card-text">voirl'article</a>

                    </div>

                </div>
            </div>



        @endforeach

    </div>
</div>
</div>
@endsection
