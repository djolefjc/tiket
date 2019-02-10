@extends('layouts/app')
@section('content')

<form class="form-control" action="{{route('answers.store',$ticket)}}" method="post">
{{csrf_field()}}
  <label for="opis">Odgovor</label>
  <textarea type="text" name="odgovor" class="form-control" required> </textarea>
  <br />
  <button type="submit" class="btn btn-primary" name="submit">Odgovori</button>
  <a href="/tickets" class="btn btn-primary">Pogledaj Sve Tikete</a>
</form>

@endsection
