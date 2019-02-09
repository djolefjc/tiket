@extends('layouts/app')
@section('content')

<form class="form-control" action="/tickets/{{$ticket->id}}/edit" method="post">
{{csrf_field()}}

  <label for="napomena">Napomena</label>
  <input type="text" name="napomena" class="form-control" required required value="{{$ticket->napomena}}">
  <label for="opis">Opis</label>
  <textarea name="opis" class="form-control" required>{{$ticket->opis}} </textarea>
  <br />
  <button type="submit" class="btn btn-primary">Promeni</button>
  <a href="/tickets" class="btn btn-primary">Pogledaj Sve Tikete</a>
</form>

@endsection
