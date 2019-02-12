<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{

    

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Table name
    protected $table = 'tickets';

    // tiket pripada korisniku (one to many relacija)
    public function user() {
      return $this->belongsTo('App\User');
    }
    public function answers() {
      return $this->hasMany('App\Answer');
    }
}
