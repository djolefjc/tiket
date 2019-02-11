

@extends('layouts.app')

@section('content')
<div class="container">


          @if(count($tickets) > 0)
          <h1>Moji Tiketi</h1>

          <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>#  </th>
                    <th>ID</th>
                    <th>Napomena</th>
                    <th>Opis</th>
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
                    <td>{{date('d/m/Y',strtotime($ticket->created_at))}}</td>
                    <td>@if($ticket->status == 1){{"Otvoren"}} @else {{"Zatvoren"}} @endif</td>

                </tr>
        @endforeach
            </tbody>
        </table>
      @else
        <h2 class="text-muted">Niste otvorili nijedan tiket!</h2>
      @endif
      <div class="links">
      <a href="/tickets/create" class="btn btn-primary">Kreiraj Novi Tiket</a>
      <a href="/tickets" class="btn btn-primary">Pogledaj Sve Tikete</a>
        </div>
      </div>


@endsection
