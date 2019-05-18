<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{

  public function country(){
    return $this->belongsTo('App\country', 'country_id');
  }
  public function cities()
  {
    return $this->hasMany('App\city','state_id');
  }
}
