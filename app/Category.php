<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'items'];

	/**
	 * Items belongs to category.
	 */
	public function items()
	{
		return $this->belongsToMany('App\Item');
	}
}
