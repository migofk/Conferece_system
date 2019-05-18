<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
  public function city(){
    return $this->belongsTo('App\city', 'city_id');
  }
}
