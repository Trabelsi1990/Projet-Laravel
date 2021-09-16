@extends('master/maitre_admin')
@section('content')
<div class="container">
   
    <form action="{{ route('admin.caroussel.store') }}" method='POST'>
        @csrf

        <div class="row">
            @foreach($shops as $shop)
                <div class="card-form m-0 w-50 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="{{ url($shop->image) }}" class="card-img-top " alt="image">
                        <div class="card-body">

                            <h5 class="card-title">
                                <strong>
                                    <a href="{{ url('admin/shop/'.$shop->id) }}">{{ $shop->nom }}
                                    </a>
                                </strong>
                            </h5>
                            <input type="checkbox" name="caroussel[]" value="{{ $shop->id }}" @if ($shop->inCaroussel)
                            checked="checked" @endif>


                            <p class="text-truncate">{{ $shop->description }}</p>

                            <p class="card-text"><small
                                    class="text-muted">{{ $shop->created_at->format('d-m-Y') }}</small>
                            </p>
                        </div>
                    </div>


                </div>
            @endforeach

            @foreach($events as $event)
                <div class="card-form m-0 w-50 col-md-3 col-sm-12">
                    <div class="card">
                        <img src="{{ url($event->image) }}" class="card-img-top " alt="image">
                        <div class="card-body">

                            <h5 class="text-left">
                                <strong>
                                    <a href="{{ url('admin/shop/'.$event->id) }}">{{ $event->nom }}
                                    </a>
                                </strong>
                            </h5>
                            <input type="checkbox" name="carousselEvent[]" value="{{ $event->id }}" @if ($event->inCaroussel) 
                            checked="checked" @endif>
                               


                            <p class="text-truncate ">{{ $event->description }}</p>

                            <p class="text-left"><small class="text-muted">{{ $event->created_at }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach($artisans as $artisan)
                <div class="card-form m-0 w-50 col-md-3 col-sm-12">
                    <div class="card">
                        <img src="{{ url($artisan->image) }}" class="card-img-top " alt="image">
                        <div class="card-body">

                            <h5 class="text-left">
                                <strong>
                                    <a href="{{ url('admin/shop/'.$artisan->id) }}">{{ $artisan->nom }}
                                    </a>
                                </strong>
                            </h5>
                            <input type="checkbox" name="carousselArtisan[]" value="{{ $artisan->id }}" @if ($artisan->inCaroussel)
                                 checked="checked" @endif>


                            <p class="text-truncate">{{ $artisan->description }}</p>

                            <p class="text-left"><small
                                    class="text-muted">{{ $artisan->created_at->format('d-m-Y') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            <button type="submit" class="btn btn-success">Ajouter au caroussel</button>
        </div>
    </form>
</div>
@endsection
