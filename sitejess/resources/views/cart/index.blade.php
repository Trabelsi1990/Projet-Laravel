@extends('master/maitre')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
@if(Cart::count()>0)
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Titre</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $produit)
                        <tr>
                            <td>
                                <div class="w-50">
                                    <img src="{{ $produit->model->image }}" alt="image" class="img-fluid rounded shadow-sm">
                                </div>
                                
                            </td>
                            <td>
                                <h5><a href=""><span>{{ $produit->model->title }}</span></a></h5>
                            </td>
                            <td>
                                <strong>{{ getPrice($produit->subtotal()) }}</strong>
                            </td>
                            <td>
                            <select name="qty" id="qty" data-id="{{$produit->rowId}}" class="custom-select">
                                  @for ($i=1 ; $i<=6 ; $i++)
                                    <option value="{{ $i }}"  {{ $i== $produit->qty ? 'selected' : '' }}>{{ $i }}</option>
                                  @endfor
                                </select>
                            </td>
                            <td>
                            <form action="{{route('cart.destroy',$produit->rowId)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                                 
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
              </div>
            </div>
          </div>
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Detail de la Commande </div>
          <div class="p-4">
            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous Total </strong><strong>{{getPrice(Cart::subtotal())}}</strong></li>
              {{-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li> --}}
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{getPrice(Cart::tax())}}</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">{{getPrice(Cart::total())}}</h5>
              </li>
            </ul><a href="{{route('checkout.index')}}" class="btn btn-dark rounded-pill py-2 btn-block">Passer a la caisse</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@else
<div class="col-md-12">
    <p>Votre panier est vide</p>
</div>

@endif
@endsection

@section('extra-js')
<script>
 var selects = document.querySelectorAll('#qty');
 //console.log(selects);
 Array.from(selects).forEach((element)=>{
   element.addEventListener('change',function(){
     var rowId = this.getAttribute('data-id');
     var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
     fetch(
       `/panier/${rowId}`,
       {
            headers: {
                     "Content-Type": "application/json",
                     "Accepte": "application/json, text-plain, */*",
                     "X-Requested-With": "XMLHttpRequest",
                     "X-CSRF-TOKEN": token
                },
            method:'PATCH',
            body: JSON.stringify({
              qty: this.value
            })     
        }
     ).then((data) =>{
       console.log(data);
       location.reload();
     }).catch((error)=>{
       console.log(error);
     })
   })
 });

</script>
@endsection