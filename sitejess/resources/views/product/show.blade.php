@extends('master/maitre')
@section('content')


  <div class="container">
   
    <div class="">
      <div class="">
        <div class="">
            <img src="{{$produit->image}}" alt="image">
          <strong class="row ">World</strong>
          <h5 class="mb-0">{{$produit->title}}</h5>
        <div class="mb-1 text-muted">{{$produit->created_at->format('d/m/y')}}</div>
        <p class="card-text mb-auto">{{$produit->description}}</p>
        <strong class="card-text mb-auto">{{$produit->getPrice()}}</strong>
        <form action="{{route('cart.store')}}" method="POST">
            @method('POST')
            @csrf
        <input type="hidden" name="produit_id" value="{{$produit->id}}">
            
            <button type="submit" class="btn btn-dark">Ajouter au panier</button>
        </form>
        
        </div>
        
      </div>
    </div>

  </div>
  


@endsection
{{-- icon loope de recherche  --}}
{{-- <div class="col-4 d-flex justify-content-end align-items-center">
    <a class="text-muted" href="#" aria-label="Search">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
    </a>
    <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
  </div> --}}
  {{-- le footer --}}
  {{-- <footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
      <a href="#">Back to top</a>
    </p>
  </footer> --}}
