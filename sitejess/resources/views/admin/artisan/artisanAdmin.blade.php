@extends('master/maitre_admin')
@section('content')
<div class="container">
    <div class="column">

        <div>
            <a href="{{ route('admin.artisan.create') }}">Nouvel Artisan</a>
        </div>

        

        <div class="row">
            @foreach($artisans as $artisan)
                <div class="card-form m-0 w-50 col-md-4 col-sm-6">
                    <div class="card">
                        <img src="{{ url($artisan->image) }}" class="card-img-top " alt="image">
                        <h5 class="card-title"><strong><a
                                    href="{{ url('admin/artisan/' . $artisan->id) }}">{{ $artisan->nom }}</a></strong>
                        </h5>
                        <p class="text-truncate" style="max-width: 400px;">{{ $artisan->description }}</p>
                        <p class="card-text">Ajouter le : <small
                                class="text-muted">{{ $artisan->created_at->format('d-m-Y') }}</small>
                        </p>

                        <div class="d-flex justify-content-end">
                            <div>
                                <a href="{{ route('admin.artisan.edit',['artisan'=>$artisan]) }}"
                                    class="btn btn-success">
                                    editer</a>
                            </div>
                            <form
                                action="{{ route('admin.artisan.destroy',['artisan' => $artisan]) }}"
                                onsubmit="return confirm('Voulez Vous vraiment supprimer cette ce créateur')";
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">supprimer</button>
                                @isset($message)
                                    <p>{{ $message }}</p>
                                @endisset
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
