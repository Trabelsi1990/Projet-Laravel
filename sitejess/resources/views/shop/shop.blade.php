@extends('master/maitre')
@section('content')
{{-- cette blade me permet d'afficher mes magasins --}}
<div class="container">
    <div class="row">
        @foreach($shops as $shop)
            <div class="card-form m-0 col-md-4 col-sm-6">
                <div class="card">
                    <img src="{{ url($shop->image) }}" class="card-img-top " alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><strong><a
                                    href="{{ url('shop/'.$shop->id) }}">{{ $shop->nom }}</a></strong>
                        </h5>
                        <div style="max-height: 200px">
                            <p class="text-truncate " style="max-width: 400px;">{{ $shop->description }}</p>
                        </div>
                        <p class="card-text">Ajouter le : <small
                                class="text-muted">{{ $shop->created_at->format('d-m-Y') }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
