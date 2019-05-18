<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $guarded = ['id'];

    //All has many  functions
    public function allcategories()
    {
      return $this->belongsToMany('App\category', 'category_company', 'company_id', 'category_id');
    }

    public function photos()
    {
      return $this->hasMany('App\company_photo','company_id');
    }
    public function events()
    {
      return $this->hasMany('App\event','company_id');
    }
    public function products()
    {
      return $this->hasMany('App\product','company_id');
    }
    public function requests()
    {
      return $this->hasMany('App\request','company_id');
    }


   //All belongs to functions
    public function user(){
      return $this->belongsTo('App\User', 'user_id');
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
