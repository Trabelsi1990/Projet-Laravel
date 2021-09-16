@extends('master/maitre')
@section('content')


    <div class="container">
         <div class="card">      {{-- class="row card text-white bg-dark"  sa c la couleur d'arriere plan en gris --}}
            <h4 >Contactez-Nous</h4>    {{-- class="card-header" sa c le soulignement et la case  --}}
            <div >
                <p>Vous avez une question, une demande … contactez-moi sur les réseaux sociaux 
                ( <a href="https://www.facebook.com/brestadresses" padding="50px"  target="_blank">https://www.facebook.com/brestadresses</a>  et 
                  <a href="https://www.instagram.com/brest_adresses/?hl=fr" target="_blank">https://www.instagram.com/brest_adresses/?hl=fr</a> ), 
                ou remplissez le formulaire suivant : </p>
            </div>
            <div class="card-body">
                <form action="{{route('contact.store') }}" method="POST">
                    @method("POST")
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control  @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Votre nom" value="{{ old('nom') }}">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="Votre email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <input type="text" class="form-control  @error('sujet') is-invalid @enderror" name="sujet" id="sujet" placeholder="sujet" value="{{ old('sujet') }}">
                        @error('sujet')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control  @error('message') is-invalid @enderror" name="message" id="message" placeholder="Votre message">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Envoyer</button>
                </form>
            </div>
            <div>
                <p> <strong>Partie pro</strong><br>  
                    Vous possédez un commerce brestois et vous souhaitez apparaître sur le site et sur les réseaux sociaux,
                     contactez-moi sur <a href="Mailto:brestadresses@gmail.com">brestadresses@gmail.com</a> . (Toutefois, afin de garder une cohérence sur la ligne éditoriale,
                      je serai en droit d’accepter, ou non, la publication de votre commerce.)
                    Vous souhaitez faire des photos ou collaborer avec Damien Peron, 
                    le photographe de Brest_adresses, contactez-le sur <a href="Mailto:perondamien22@gmail.com">perondamien22@gmail.com</a>  pour plus d’informations.</p>
            </div>
            

        </div>
    </div>
@endsection