

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="is-logged-in">

  </div>
    <div class="row justify-content-center">

          @if(count($tickets) > 0)
          <h1>Moji Tiketi</h1>

          <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>#  </th>
                    <th>ID</th>
                    <th>Napomena</th>
                    <th>Opis</th>
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
                    <td>{{$ticket->status}}</td>

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
</div>

@endsection
