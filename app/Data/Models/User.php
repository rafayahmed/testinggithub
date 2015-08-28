<?php

namespace Rozee\Data\Models;

use Illuminate\Database\Eloquent\Model;



class User extends Model
{
	public $table = 'user';
	

	public function country()
	{

		return $this->hasOne('Rozee\Data\Models\Country','id','country_id');
	}

	public function states()
	{

		return $this->hasOne('Rozee\Data\Models\State','id','state_id');
	}

	public function city()
	{

		return $this->hasOne('Rozee\Data\Models\City','id','city_id');
	}

	
	
	
}
