<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'categories'];

	/**
	 * Item categoryes.
	 */
	public function categories()
	{
		return $this->belongsToMany('App\Category');
	}
}
