@extends('layouts/app')
@section('content')
  <div class="blog-post container">
        <a href="/tickets" class="btn btn-primary">Pogledaj Sve Tikete</a>
         <h2 class="blog-post-title">{{$ticket->napomena}}</h2>
         <p class="blog-post-meta">{{$ticket->updated_at}} Tiket otvorio: <a href="#">Jacob</a></p>
        <p>
          {{$ticket->opis}}
        </p>
        <p class="blog-post-meta">
          {{$ticket->status}}
        </p>
        @if(!Auth::guest()) <!-- ako nije gost moze da vidi -->
          @if(Auth::user()->id == $ticket->user_id) <!-- ako je njegov id isti kao user_id na tom tiketu -->
        <a href="/tickets/{{$ticket->id}}/edit" class="btn btn-secondary">Promeni</a>
        <a href="/tickets/{{$ticket->id}}/delete" class="btn btn-dark">Izbrisi</a>
       </div><!-- /.blog-post -->
     @endif
     @endif
@endsection
