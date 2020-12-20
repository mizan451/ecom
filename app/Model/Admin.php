<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
 
   protected $guard = [];
   use Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */


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
}
