@extends('master/maitre_admin')
@section('content')
@if(session('supprimer'))
        <div class="alert alert-success">
            {{ session('supprimer') }}
        </div>
        @endif
<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom</th>
        <th>E-Mail</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>suppression</th>
      </tr>
    </thead>
    <tbody>
         @foreach ($contacts as $contact)
      <tr>
        <td>{{$contact->id}}</td>
        <td>{{$contact->nom}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->sujet}}</td>
        <td>{{$contact->message}}</td>
        <td>
            <form action="{{route('admin.contact.destroy',['contact' => $contact])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Supprimer</button>
            </form>
        </td> 
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection