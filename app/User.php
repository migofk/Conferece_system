<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
      return $this->belongsTo('App\role', 'role_id');
    }

    public function companies()
    {
      return $this->hasOne('App\company','user_id');
    }

    public function bids()
    {
      return $this->hasMany('App\bid','user_id');
    }

    public function event_user()
    {
      return $this->hasMany('App\event_user','user_id');
    }

    public function support_tickets()
    {
      return $this->hasMany('App\support_ticket','user_id');
    }
}
