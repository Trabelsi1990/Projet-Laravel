@extends('master/maitre_admin')
@section('content')
{{-- Page Home de mon appli web ! qui en Mode Mobile c'est en forme de carte des nouveau Magasin publié par l'administrateur et en mode ordi un caroussel qui fait tourner 
les nouveaux magasins qui ont été ajouté sur le site en étant connécter en admin--}}
@mobile
<div class="container">
    <div class="row">
        <div class="card-form">
            @foreach($shops as $shop)
            <div class="card">
                 <img src="{{ url($shop->image) }}" class="card-img-top" alt="image" width="100%">
                <div class="card-body">
                {{-- style="opacity : 0.75 ; background-color: rgb(0,0,0);width:100%; position: absolute; left:0; right:0; bottom:0;"> --}}
                    <h5 class="card-title"><strong><a
                                href="{{ url('admin/shop/'.$shop->id) }}">{{ $shop->nom }}</a></strong>
                    </h5>
                    <p class="d-inline-block text-truncate" style="max-width: 250px;">{{ $shop->description }}</p>
                    <p class="card-text "><small
                        class="text-muted">{{ $shop->created_at->format('d-m-Y') }}</small>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-form ">
            @foreach($events as $event)
                <div class="card">
                    <a href="{{ url('admin/evenement/'.$event->id) }}">
                        <div>
                            <img src="{{ url($event->image) }}" class="card-img-top " alt="image">
                            <div class="card-body">
                            {{-- style="opacity : 0.75 ; background-color: rgb(0,0,0);width:100%; position: absolute; left:0; right:0; bottom:0;"> --}}
                                <h5 class="card-title"><strong>
                                        {{ $event->nom }}</strong>
                                </h5>
                                <p class="d-inline-block text-truncate" style="max-width: 250px;">{{ $event->description }}</p>
                                <p class="card-text"><small
                                        class="text-muted">{{ $event->created_at->format('d-m-Y') }}</small>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="card-form">
            @foreach($artisans as $artisan)
                    <div class="card">
                        <a href="{{ url('admin/artisan/' . $artisan->id) }}">
                            <img src="{{ url($artisan->image) }}" class="card-img-top " alt="image" style="height: 74vh">
                            <div class="card-body">
                                {{-- style="opacity : 0.75 ; background-color: rgb(0,0,0);width:100%; position: absolute; left:0; right:0; bottom:0;"> --}}
                                <h5 class="card-title text-left"><strong>{{ $artisan->nom }}</strong>
                                </h5>
                                <p class="d-inline-block text-truncate" style="max-width: 250px;">{{ $artisan->description }}</p>
                                <p class="text-left"><small
                                        class="text-muted">{{ $artisan->created_at->format('d-m-Y') }}</small>
                                </p>
                            </div>
                        </a>
                    </div>
            @endforeach
        </div>
    </div>
</div>

  
@elsemobile
   <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            @foreach($shops as $shop)
                @if($loop->first)
                    <div class="carousel-item active">
                    @else
                        <div class="carousel-item">
                @endif
                <a href="{{ url('admin/shop/'.$shop->id) }}">
                    <img src="{{ url($shop->image) }}" class="card-img-top " alt="image" style="height: 74vh">
                    <div class="carousel-caption  d-md-block"
                        style="opacity : 0.75 ; background-color: rgb(0,0,0); width:100%; position: absolute; left:0; right:0; bottom:0;">
                        <h5 class="text-left"><strong>{{ $shop->nom }}</strong>
                        </h5>
                        <p class="text-truncate " style="max-width: 85%;">{{ $shop->description }}</p>
                        <p class=" text-left"><small
                                class="text-muted">{{ $shop->created_at->format('d-m-Y') }}</small>
                        </p>
                    </div>

                </a>
        </div>
@endforeach
@foreach($events as $event)

    <div class="carousel-item ">
        <a href="{{ url('admin/evenement/'.$event->id) }}">
            <img src="{{ url($event->image) }}" class="card-img-top " alt="image" style="height: 74vh">
            <div class="carousel-caption  d-md-block"
                style="opacity : 0.75 ; background-color: rgb(0,0,0); width:100%; position: absolute; left:0; right:0; bottom:0;">
                <h5 class="text-left"><strong>
                        {{ $event->nom }}</strong>
                </h5>
                <p class="text-truncate " style="max-width: 85%;">{{ $event->description }}</p>
                <p class="text-left"><small
                        class="text-muted">{{ $event->created_at->format('d-m-Y') }}</small></p>
            </div>

        </a>
    </div>
@endforeach
@foreach($artisans as $artisan)
    <div class="carousel-item">
        <a href="{{ url('admin/artisan/' . $artisan->id) }}">
            <img src="{{ url($artisan->image) }}" class="card-img-top " alt="image" style="height: 74vh">
            <div class="carousel-caption  d-md-block"
                style="opacity : 0.75 ; background-color: rgb(0,0,0);width:100%; position: absolute; left:0; right:0; bottom:0;">
                <h5 class="text-left"><strong>{{ $artisan->nom }}</strong>
                </h5>
                <p class="text-truncate">{{ $artisan->description }}</p>
                <p class="text-left"><small
                        class="text-muted">{{ $artisan->created_at->format('d-m-Y') }}</small>
                </p>
            </div>
        </a>
    </div>
@endforeach


</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
@endmobile
@endsection
