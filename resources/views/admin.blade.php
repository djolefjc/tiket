

@extends('layouts.app')

@section('content')
<div class="container">

<a class="btn btn-primary" href="{{route('tickets')}}">Pogledaj Sve Tikete</a>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>



</div>

@endsection
