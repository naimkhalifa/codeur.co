<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Post extends Model
{
    protected $guarded = ['id'];

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function getFormattedDateAttribute()
    {
    	if ($this->published_at !== null) {
        	return Date::parse($this->published_at)->format('l j F Y');
    	}
    	return '-';
    }
}
