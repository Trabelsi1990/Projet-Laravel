@extends('master/maitre_admin')
@section('content')
<div class="container">
        <div>
            <a href="{{ route('admin.evenement.create') }}">Nouvelle Evenement</a>
        </div>
                <div class="row">
                    @foreach($events as $event)
                        <div class="card-form col-md-4 col-sm-6">
                            <div class="card">
                                <img src="/{{ $event->image }}" class="card-img-top " alt="image">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><a
                                                href="{{ url('admin/evenement/' . $event->id) }}">{{ $event->nom }}</a></strong>
                                    </h5>
                                    <p class="text-truncate">{{ $event->description }}</p>
                                    <p class="card-text">{{ $event->prix }}</p>
                                    <p class="card-text">Ajouter le : <small
                                            class="text-muted">{{ $event->created_at->format('d-m-Y') }}</small>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ ('/admin/evenement/'.$event->id.'/edit') }}"
                                        class="btn btn-success">Modifier</a>
                                    <form
                                        action="{{ route('admin.evenement.destroy', ['evenement'=>$event]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Voulez Vous vraiment supprimer cette Evenement')" ;>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                        @isset($message)
                                            <p>{{ $message }}</p>
                                        @endisset
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
            </div>
@endsection
