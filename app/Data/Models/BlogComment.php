<?php

namespace Rozee\Data\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public $table='blog_comment';

   public function user()
	{

		return $this->hasOne('Rozee\Data\Models\User','id','user_id');
	}

	public function blog()
	{

		return $this->belongsto('Rozee\Data\Models\Blog','blog_id','id');
	}
   

}
