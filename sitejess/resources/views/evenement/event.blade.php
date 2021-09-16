@extends('master/maitre')
@section('content')
<div class="container">
    <div class="row">
        @foreach($events as $event)
            <div class="card-form m-0 col-md-4 col-sm-6">
                <div class="card">
                    <img src="/{{ $event->image }}" class="card-img-top " alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><strong><a
                                    href="{{ url('/evenement/'.$event->id) }}">{{ $event->nom }}</a></strong>
                        </h5>
                        <p class="text-truncate">{{ $event->description }}</p>
                        <p class="card-text">Ajouter le : <small class="text-muted">{{ $event->created_at->format('d-m-Y') }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
