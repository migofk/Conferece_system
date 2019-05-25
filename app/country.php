<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{

  protected $guarded = ['id'];
  public function states()
  {
    return $this->hasMany('App\state','country_id');
  }
}
