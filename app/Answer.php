<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{




  public function tickets(){
    return $this->belongsTo('App\Ticket');
  }
  public function admin(){
    return $this->belongsTo('App\Admin');
}
