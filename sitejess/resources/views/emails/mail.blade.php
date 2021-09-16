@component('mail::message')
# {{$nom}}
<h3>{{$email}}</h3> <br>

<h4>{{$sujet}}</h4>  

<p>{{$message}}</p>



Thanks,<br>
{{ config('app.name') }}
@endcomponent