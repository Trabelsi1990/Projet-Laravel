@extends('master/maitre_admin')
@section('content')
<div class="allo1">
<div class="container">
    <div class="event">
        <div class=" div-img-eve ">
            <h3 style="text-align: center; "><strong>{{ $event->nom }}</strong></h3>
            <div  class="img">
                <img src="/{{ $event->image }}" alt="Image" class="flex-grow-1 img-event" width="30%" style="max-height: 70vh">
            </div>
            <div class="flex-grow-2 div-eve-2">
                
                <div class="div-text" style="text-align: center">
                <p style="margin-top: 4rem">
                    <label><strong>Lieu :</strong></label>
                    {{ $event->lieu }}
                </p>
                <p>
                    <label><strong>Date :</strong></label>
                    {{ $event->date->format('d-m-Y') }}
                </p>
                <p>
                    <label><strong>Heure :</strong></label>
                    {{ $event->heure->format('H\hm')}}
                </p>
                <p>
                    <label><strong>Prix :</strong></label>
                    {{ $event->prix }} euros
                    <p>
                        <label><strong>Description de l'evenement :</strong></label><br>
                        {{ $event->description }}
                    </p>
            </div>
          
        </div>
        </div>



        <div class="d-flex justify-content-end">
            <a href="{{ ('admin/evenement/'.$event->id.'/edit') }}"
                class="btn btn-success">modifier</a>

            <form
                action="{{ route('admin.evenement.destroy',['evenement'=>$event]) }}"
                method="POST">
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
</div>
@endsection
