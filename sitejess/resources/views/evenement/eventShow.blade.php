{{-- @extends('master/maitre')
@section('content')
<div class="container">
    <div>
        <div>
            <h3>
                <strong>
                    {{$event->nom}}
                </strong>
            </h3>
        </div>
       <div>
        <p>
            <label>lieu de  l'Evénement :</label>
             {{$event->lieu}}
        </p>
       </div>
        <div>
            
            <p>
                <label >date de  l'Evénement :</label>
               {{$event->date}}
            </p>
        </div>
        <div>
            
            <p>
                <label >prix :</label>
               {{$event->prix}}
            </p>
        </div>
        <div>
            <p>
                <label >l'heure de  l'Evénement :</label>
                {{$event->heure}}
            </p>
        </div>
        <div>
            <img src="/{{$event->image}}" alt="Image" width="">
        </div>
        <div>
            <p>
                <label >description de  l'Evénement :</label>
                 {{$event->description}}
            </p>
        </div>
        
    </div>
</div>
@endsection --}}

@extends('master/maitre')
@section('content')
<div class="container">
    {{-- <div>

        <div class="div-img-eve">


            <div class="flex-grow-2 div-eve-2  " >
                <h3 style="text-align: center; "><strong>{{ $event->nom }}</strong></h3>
                <div  class="img">
                    <img src="/{{ $event->image }}" alt="Image" class="flex-grow-1 img-event" width="30%" style="max-height: 70vh">
                </div>
                <p style="margin-top: 10%">
                    <label><strong>Lieu :</strong></label>
                    {{ $event->lieu }}
                </p>
                <p>
                    <label><strong>Date :</strong></label>
                    {{ $event->date }}
                </p>
                <p>
                    <label><strong>Heure :</strong></label>
                    {{ $event->heure }}
                </p>
                <p>
                    <label><strong>Prix :</strong></label>
                    {{ $event->prix }}
                    <p>
                        <label><strong>Description de l'evenement :</strong></label><br>
                        {{ $event->description }}
                    </p>
            </div>
            <img src="/{{ $event->image }}" alt="Image" class="flex-grow-1" style="max-height: 70vh">

        </div>
    </div> --}}
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
    </div>
</div>
@endsection
