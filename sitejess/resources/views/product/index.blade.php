@extends('master/maitre')
@section('content')
{{--  blade pour l'e commerce  --}}
<div class="container">
    <div class="row">
        @foreach($produits as $produit)
            <div class="card-form m-0 col-md-4 col-sm-12" >
                <div class="card" >
                    <img src="{{ $produit->image }}" alt="image" class="card-img-top" style="height: 12rem">
                    <div class="card-body">
                        <h3><strong class="">World</strong></h3>
                        <h5 class="card-title" style="height: 1rem">{{ $produit->title }}</h5>
                        <div class=" card-text">
                            <p> <small
                                    class="text-muted" style="margin-top: 1rem">{{ $produit->created_at->format('d/m/y') }}</small>
                            </p>
                        </div>
                        <p class="card-text">{{ $produit->subtitle }}</p>
                        <strong class="card-text">{{ $produit->getPrice() }}</strong>
                        <a href="{{ route('boutique.show',$produit->slug) }}"
                            class="card-text">voir l'article</a>

                    </div>

                </div>
            </div>
        @endforeach

    </div>

</div>
</body>

</html>
@endsection
