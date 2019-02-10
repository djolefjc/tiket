<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  protected $dateFormat = 'd/m/y';

  public function tickets(){
    return $this->belongsTo('App\Ticket');
  }
}
