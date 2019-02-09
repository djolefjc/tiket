@extends('layouts/app')
@section('content')

<form class="form-control" action="/tickets" method="post">
{{csrf_field()}}
  <label for="napomena">Napomena</label>
  <input type="text" name="napomena" class="form-control" required/>
  <label for="opis">Opis</label>
  <textarea type="text" name="opis" class="form-control" required> </textarea>
  <br />
  <button type="submit" class="btn btn-primary">Kreiraj</button>
  <a href="/tickets" class="btn btn-primary">Pogledaj Sve Tikete</a>
</form>

@endsection
