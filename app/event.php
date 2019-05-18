<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $guarded = ['id'];

    //All has many  functions
    public function photos()
    {
      return $this->hasMany('App\company_photo','event_id');
    }

    public function event_user()
    {
      return $this->hasMany('App\event_user','event_id');
    }



    //All belongs to functions
    public function user(){
      return $this->belongsTo('App\User', 'user_id');
    }
    public function company(){
      return $this->belongsTo('App\company', 'company_id');
    }
    public function category(){
      return $this->belongsTo('App\category', 'category_id');
    }
    public function country(){
      return $this->belongsTo('App\country', 'country_id');
    }
    public function city(){
      return $this->belongsTo('App\city', 'city_id');
    }
    public function state(){
      return $this->belongsTo('App\state', 'state_id');
    }
    public function added_user(){
      return $this->belongsTo('App\User', 'added_by');
    }
}
