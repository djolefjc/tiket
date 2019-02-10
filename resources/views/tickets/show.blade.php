@extends('layouts/app')
@section('content')
  <div class="blog-post container">
        <a href="/tickets" class="btn btn-primary">Pogledaj Sve Tikete</a>
        @if(!Auth::guest()) <!-- ako nije gost moze da vidi -->
          @if(Auth::user()->id == $ticket->user_id) <!-- ako je njegov id isti kao user_id na tom tiketu -->
        <a href="/tickets/{{$ticket->id}}/edit" class="btn btn-secondary">Promeni</a>
        <a href="/tickets/{{$ticket->id}}/delete" class="btn btn-dark">Izbrisi</a>

     @endif
     @endif
         <h2 class="blog-post-title">{{$ticket->napomena}}</h2>
         <p class="blog-post-meta">{{$ticket->updated_at}} Tiket otvorio: <a href="#">{{$ticket->user->name}}</a></p>
        <p>
          {{$ticket->opis}}
        </p>

        <hr />
        <h3>Odgovori</h3>
        <br />


     @if(count($answers) > 0)
     @foreach($answers as $answer)
       <p class="blog-post-meta">
         {{$answer->created_at}}
       </p>
       <p>
         {{$answer->odgovor}}
       </p>
       <br />
     @endforeach
   @else
     <h1> Nema jos uvek odgovora!</h1>
   @endif
     <p class="blog-post-meta">
       <?php if($ticket->status == 1){echo"Otvoren";}else{echo"Zatvoren";} ?>
       </p>
       <a class="btn btn-primary" href="{{route('answers.create',$ticket->id)}}">Odgovori</a>
      </div><!-- /.blog-post -->
@endsection
