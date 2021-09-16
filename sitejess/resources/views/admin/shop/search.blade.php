@extends('master/maitre')
@section('content')
<div class="container">
    <div class="row">
   @foreach ($mag as $shop)
     <div class="col-4 card">  
           <img src="{{url($shop->image)}}" width="100 px"> 
            <div class="tit_desc">
               <h3><strong><a href="{{url('/shop/' . $shop->id_magasin)}}">{{$shop->nom}}</a></strong></h3> 
               <p>{{$shop->description}}</p>
            </div>
    </div> 
  @endforeach  
</div>
</div>     
@endsection

{{-- sous_categorie --}}