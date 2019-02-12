
@extends('layouts.app')

@section('content')
<div class="container text-center">
  <h1>Otvoreni tiketi</h1>
  @if(count($tickets) > 0)
  <table id="table_id" class="display">
    <thead>
        <tr>
            <th>#  </th>
            <th>ID</th>
            <th>Napomena</th>
            <th>Opis</th>
            <th>Ime</th>
            <th>Datum</th>
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
            <td><a href="/tickets/{{$ticket->user_id}}/user">{{$ticket->user->name}}</a></td>
            <td>{{date('d/m/Y',strtotime($ticket->created_at))}}</td>
            <td> @if($ticket->status == 1){{"Otvoren"}} @else {{"Zatvoren"}} @endif</td>

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
@endsection
