<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subattendant extends Model
{
    public function attendant(){
        return $this->belongsTo('App\country', 'country_id');
      }
}
