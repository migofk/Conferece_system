<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
  protected $fillable = [
      'name','summary', 'description', 'featureImage','featureThumbnail1','featureThumbnail2',
      'user_id','display','sort','featured','lang_id','lang_parent','created_at'
  ];
}
