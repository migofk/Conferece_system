<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = ['address_ar','address_en','phone1','phone2','email','facebook'
    ,'twitter','google','instagram','linkedIn'
  ];
}
