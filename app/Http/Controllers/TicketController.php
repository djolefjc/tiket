<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ticket;
use App\User;

class TicketController extends Controller
{




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);


    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $tickets =Post::orderBy('title','asc')->get();
        // $ticket = Post::where('title','Neko ime')->get();
        $tickets = Ticket::all();
        return view('tickets/index')->with('tickets',$tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'napomena' => 'required',
        'opis' => 'required'
      ]);
      $ticket = new Ticket;
      $ticket->sifra = uniqid();
      $ticket->opis = request('opis');
      $ticket->napomena = request('napomena');
      $ticket->status = 1;
      $ticket->user_id = auth()->user()->id;
      $ticket->save();
      return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $answers = Ticket::find($id)->answers;
        return view('tickets/show')->with('ticket',$ticket)->with('answers',$answers);

    }

    public function showUser($user_id)
    {

      $tickets = Ticket::where('user_id',$user_id)->get();
      $ticket = Ticket::find($user_id);




     return view('tickets/user')->with('tickets',$tickets)->with('ticket',$ticket);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
      //proveri da li je to ispravan korisniku
        if(auth()->user()->id !== $ticket->user_id){
          return redirect('tickets');
        }

      return view('tickets/edit')->with('ticket',$ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request, Ticket $ticket)
    {
      $ticket->napomena = request('napomena');
      $ticket->opis = request('opis');
      $ticket->user_id = auth()->user()->id;
      $ticket->save();

      return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

      $ticket=Ticket::find($id);

      //proveri da li je to ispravan korisniku
        if(auth()->user()->id !== $ticket->user_id){
          return redirect()->route('tickets');
        }



        $ticket->delete();
        return redirect()->route('home');
    }
}
