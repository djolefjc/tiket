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
         <p class="blog-post-meta">{{date('d/m/Y',strtotime($ticket->created_at))}} Tiket otvorio: <a href="#">{{$ticket->user->name}}</a></p>
        <p>
          {{$ticket->opis}}
        </p>

        <hr />
        <h3>Odgovori</h3>
        <br />


     @if(count($answers) > 0)
     @foreach($answers as $answer)
       <p class="blog-post-meta">
         {{date('d/m/Y',strtotime($answer->created_at))}} | {{$answer->admin->name}}
       </p>
       <p>
         {{$answer->odgovor}}
       </p>

     @endforeach
   @else
     <h1> Nema jos uvek odgovora!</h1>
   @endif


    @auth('admin')
   <div class="row text-center" >
   <div class="col-sm">



       <form  method="post"  action="/tickets/{{$ticket->id}}/status" >
         @csrf
           <div class="col">
          <button class="btn btn-primary" name="submit" type="submit">Potvrdi</button>
             </div>
               <br />
             <div class="col">
             <select class="form-control contorl-label" name="choice" >

               <option value="1" {{$ticket->status == 1 ? "selected" : ""}}>
                 Otvoren
               </option>
               <option value="0" {{$ticket->status == 0 ? "selected" : ""}}>
                 Zatvoren
               </option>
             </select>
           </div>

         </form>



     </div>
     <div class="col-sm">
         <h3>  @if($ticket->status == 1){{"Otvoren"}} @else {{"Zatvoren"}} @endif</h3>
     </div>
       <div class="col-sm">
         @if($ticket->status == 1)
           <a class="btn btn-primary" href="{{route('answers.create',$ticket->id)}}">Odgovori</a>
         @endif
       </div>
       </div>
     @endauth
      </div><!-- /.blog-post -->

@endsection
