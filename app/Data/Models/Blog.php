<?php

namespace Rozee\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   public $table='blog';

   public function user()
   {
   	return $this->hasOne('Rozee\Data\Models\User','id','user_id');   	
   }

   public function comments()
    {
        return $this->hasMany('Rozee\Data\Models\BlogComment');
    }



   
}
