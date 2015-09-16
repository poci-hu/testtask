<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function videos()
	{
		return $this->belongsToMany('\App\Models\Video');
	}

	public function getCountAttribute()
	{
		return $this->videos->count();
	}

	public function __toString()
	{
		return $this->name;
	}

}
