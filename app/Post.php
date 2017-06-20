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

 	public function getFormattedDateAttribute()
 	{
 		return $this->published_at->format('d/m/Y');
 	}
}
