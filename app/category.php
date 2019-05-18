<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  public function allcompanies()
  {
    return $this->belongsToMany('App\company', 'category_company', 'category_id', 'company_id');
  }
}
