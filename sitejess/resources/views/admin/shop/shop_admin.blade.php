@extends('master/maitre_admin')
@section('content')
{{-- this blade allows me to display my stores --}}
<div class="allo {{$categorie}}">
<div class="container">
    <div class="column">
        <div>
            <a href="{{ route('admin.shop.create') }}">Nouveau Magasin</a>
        </div>
        <div class="row">

            @foreach($shops as $shop)
                <div class="card-form col-md-4 col-sm-6">
                    <div class="card">
                        <img src="{{ url($shop->image) }}" class="card-img-top " alt="image">
                        <div class="card-body">
                            <h5 class="card-title"><strong><a
                                        href="{{ url('admin/shop/'.$shop->id) }}">{{ $shop->nom }}</a></strong>
                            </h5>
                            <p class=" text-truncate " style="max-width: 400px;">{{ $shop->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $shop->created_at->format('d-m-Y') }}</small></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="">
                                <a href="{{ route('admin.shop.edit',['shop'=>$shop]) }}"
                                    class="btn btn-success">
                                    editer</a>
                            </div>
                            <form
                                action="{{ route('admin.shop.destroy',['shop' => $shop]) }}"
                                onsubmit="return confirm('Voulez Vous vraiment supprimer ce magasin')";
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
</div>
@endsection
