<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = ['id'];

	public function scopePublished($query)
 	{
 		return $query->whereNotNull('published_at');
 	}
}
