<?php

namespace App;

<<<<<<< HEAD
use App\Exceptions\Posts\PostCreationUnauthorizedException;
=======
>>>>>>> 33e5ea71108e1e2657c20932e088535d8a7e0c94
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

    public function isAdmin()
    {
        return $this->type == 'admin';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function savePost($post)
    {
        if ($this->isAdmin() == false) {
            throw new PostCreationUnauthorizedException();
        }

        return $this->posts()->save($post);
    }
}
