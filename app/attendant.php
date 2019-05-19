<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendant extends Model
{
    protected $guarded = ['id'];
    public function country(){
        return $this->belongsTo('App\country', 'country_id');
      }
}
