<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Ticket;


class AnswersController extends Controller
{

  public function __construct()
  {

      $this->middleware('auth:admin',['only' => 'create']);


  }


    public function create($ticket) {

      return view('answers/create')->with('ticket',$ticket);
    }


    public function store(Request $request, $ticket) {
      $this->validate($request, [
        'odgovor' => 'required'
      ]);

      $answer = new Answer;
      $answer->odgovor = request('odgovor');
      $answer->ticket_id = $ticket;
      $answer->admin_id = auth('admin')->user()->id;
      $answer->save();


      return redirect()->route('tickets.index');
    }
}
