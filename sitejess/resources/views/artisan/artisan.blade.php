@extends('master/maitre')
@section('content')
{{-- this blade allows me to display my stores --}}
<div class="container">
    <div class="row">
        @foreach($artisans as $artisan)
            <div class="card-form m-0 col-md-4 col-sm-6">
                <div class="card">
                    <img src="{{ url($artisan->image) }}" class="card-img-top " alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><strong><a
                                    href="{{ url('artisan/'.$artisan->id) }}">{{ $artisan->nom }}</a></strong>
                        </h5>
                        <p class="card-text">{{ $artisan->marque }}</p>
                        <p class="text-truncate" style="max-width: 400px;">{{ $artisan->description }}</p>
                        <p class="card-text">Ajouter le : <small
                                class="text-muted">{{ $artisan->created_at->format('d/m/Y') }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
