@extends('layouts/app')
@section('content')
<main role="main" class="container">
  <a href="/tickets/create" class="btn btn-primary">Kreiraj novi tiket</a>
  <div class="starter-template text-center">
      <h1>Svi Tiketi</h1>
    @if(count($tickets) > 0)
    <table id="table_id" class="display">
      <thead>
          <tr>
              <th>#  </th>
              <th>ID</th>
              <th>Napomena</th>
              <th>Opis</th>
              <th>Ime</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>
@foreach($tickets as $ticket)
    <tr>
              <td>
              <a href="/tickets/{{$ticket->id}}" class="btn btn-secondary"> >> </a>
              </td>
              <td>{{$ticket->sifra}}</td>
              <td>{{$ticket->napomena}}</td>
              <td>{{$ticket->opis}}</td>
              <td><a href="/tickets/{{$ticket->user_id}}//user">{{$ticket->user->name}}</a></td>
              <td> <?php if($ticket->status == 1){echo"Otvoren";}else{echo"Zatvoren";} ?></td>

          </tr>
  @endforeach
      </tbody>
  </table>

@else
  <p class="text-muted">
    No tickets found!
  </p>
@endif
  </div>

</main><!-- /.container -->

@endsection
