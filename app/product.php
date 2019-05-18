<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  protected $guarded = ['id'];
  public function company(){
    return $this->belongsTo('App\company', 'company_id');
  }
  public function category(){
    return $this->belongsTo('App\category', 'category_id');
  }
}
