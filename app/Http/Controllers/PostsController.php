<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function show($id, Post $post)
    {
        $post = Post::published()->findOrFail($id);

        return view('publications.show', ['post' => $post]);
    }
}
