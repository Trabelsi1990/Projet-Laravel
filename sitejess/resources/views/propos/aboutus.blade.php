@extends('master/maitre')
@section('content')
<h2 style="text-align: center; margin-bottom : 3rem">A PROPOS DE NOUS</h2>
{{-- blade A propos de nous  --}}
<div class="container-fluide">
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
       
     @endforeach  
   
  </div>
</div>
@endsection