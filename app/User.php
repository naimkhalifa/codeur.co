<?php

namespace App;

use App\Exceptions\Posts\PostCreationUnauthorizedException;
use App\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeAdmin($query)
    {
        return $query->whereType('admin');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function savePost($post)
    {
        if ($this->type !== 'admin') {
            throw new PostCreationUnauthorizedException;
        }

        return $this->posts()->save($post);
    }
}
