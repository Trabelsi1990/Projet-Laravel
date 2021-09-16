@extends('master/maitre_admin')
@section('content')

<h2 style="text-align: center; margin-top:2rem">A PROPOS DE NOUS</h2>
    <div class="container-fluide">
    <a href="{{route('admin.A_propos.create')}}">Nouveau A propos</a>
    <div class="propos ">
        @foreach ($propos as $propo)
            <div class="form-group row" style="margin-left:2rem; margin-right:2rem; margin-top:2rem">
              
            
                <div class="propos-1">
                <p class="p-propos-1 flex-grow-1" >{{$propo->description}}</p>
                 <img src="/{{$propo->image1}}" class="img-propos" >
              </div>
            
              
               <div class="row">
                 <h4>{{$propo->nom_fondatrice}}</h4>
                 <div class="d-flex propos-2 " style="margin-bottom:2rem; justify-content : space-between">
                    <img src="/{{($propo->image2)}}" style="width: 320px; height: 320px; margin-top: 1.5rem;"> 
                    <p class="text-sm-center p-propos-1 flex-grow-1" >{{$propo->description2}}</p>
                 </div>
               
               </div>
                <div class="row">
                  <h5>{{$propo->nom_photographe}}</h5>
                  <div class="d-flex propos-3" style="margin-bottom:2rem; justify-content : space-between">
                    <p class=" p-propos-1 flex-grow-1" > {{$propo->description_photographe}}</p>
                    <img src="/{{($propo->image_photographe)}}" style="width: 320px; height:490px"> 
                  </div>
                
                </div>
                
            </div>
         <div class="" >
           {{-- <div class="d-flex justify-content-end">
             <button type="submit" class="btn btn-success">
               <a href="{{'/A_propos/' . $propo->id . '/edit'}}"> editer</a> </button>
            </div> --}}
            <form action="{{route('admin.A_propos.destroy',['A_propo' => $propo])}}" 
              onsubmit="return confirm('Voulez Vous vraiment supprimer ces Textes')";
              method="POST">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-outline-danger">supprimer</button>
             @isset($message)
             {{-- si ça passe ici c'est que la variable message existe --}}
             <p>Ceci est un message de la plus haute importance de Fire the Coder !</p>
             {{-- ici c'est le message que l'on vient de définir dans la methode
                 update --}}
             <p>{{ $message }}</p>
             @endisset
         </form>
       @endforeach  
     </div>
    </div>
  </div>
@endsection