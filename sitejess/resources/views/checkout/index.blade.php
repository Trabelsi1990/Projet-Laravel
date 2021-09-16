@extends('master/maitre')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<div class="col-md-12">
    <h1>Page de paiement</h1>
    <div class="row">
        <div class="col-md-6">
        <form id="payment-form" class="my-4" action="{{route('checkout.store')}}" method="POST">
            @csrf
                <div id="card-element">
                  <!-- Elements will create input elements here -->
                </div>
              
                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>
              
                <button id="submit" class="btn btn-success mt-4">Procéder au paiement ({{getPrice(Cart::total())}})</button>
              </form>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    var stripe = Stripe('pk_test_51H5VjWHsh7ijhM2kbEYjdjMiDGcumgAjLrEHnbxr2RQhohT9kU02oeVDtgSnWso2rxEv0Nohz0ElG7oSJWMwxhqf00Hdzs1Jke');
    var elements = stripe.elements();
    var style = {
    base: {
      color: "#32325d",
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: "antialiased",
      fontSize: "16px",
      "::placeholder": {
        color: "#aab7c4"
      }
    },
    invalid: {
      color: "#fa755a",
      iconColor: "#fa755a"
    }
  };
    //Elements valide la saisie utilisateur lors de sa saisie. Pour aider vos clients à détecter les erreurs,
    // écoutez les événements de changement sur l'élément de la carte et affichez les erreurs
    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.on('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
    displayError.classList.add('alert','alert-warning');   
    displayError.textContent = error.message;
    } else {
    displayError.classList.remove('alert','alert-warning');  
    displayError.textContent = '';
    }
    });
    var submitButton = document.getElementById('submit');
//Pour terminer le paiement lorsque l'utilisateur clique, récupérez le secret client à partir du PaymentIntent 
//que vous avez créé à l'étape deux et appelez stripe.confirmCardPayment avec le secret client.
// Transmettez des informations de facturation supplémentaires, telles que le nom et l'adresse du titulaire de la carte, au hachage billing_details.
//  L'élément de carte envoie automatiquement les informations du code postal du client. Toutefois, la combinaison de cardNumber,
//  cardCvc et cardExpiry Elements nécessite que vous transmettiez le code postal à billing_details [adresse] [code_ postal].

   var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  submitButton.disabled =true;
  stripe.confirmCardPayment("{{$clientSecret}}", {
    payment_method: {
      card: card,
    }
  }).then(function(result) {
    if (result.error) {
        submitButton.disabled=false;
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
        var paymentIntent = result.paymentIntent;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var form = document.getElementById('payment-form');
        var url= form.action;
        var redirect = '/merci';
        fetch(
            url,
            {
                headers: {
                     "Content-Type": "application/json",
                     "Accepte": "application/json, text-plain, */*",
                     "X-Requested-With": "XMLHttpRequest",
                     "X-CSRF-TOKEN": token
                },
                method:'post',
                body: JSON.stringify({
                    paymentIntent: paymentIntent
                })
            }
        ).then((data)=>{
            console.log(data)
            window.location.href = redirect;
        }).catch((error)=>{
            console.log(error)
        })
      }
    }
  });
});
</script>
@endsection