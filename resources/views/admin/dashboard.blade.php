
@extends('layouts.app')

@section('content')
<div class="container text-center">

          <h1>  Admin's Dashboard </h1>


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
  <?php $logged_since = Auth::user()->created_at; ?>

                    <p>{{date('h:i',strtotime($logged_since))}} </p>

          </div>
@endsection
