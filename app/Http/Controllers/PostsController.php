<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
	public function index()
	{
		$posts = Post::latest()->get();

		return view('publications.all', ['posts' => $posts]);
	}

    public function show($slug, Post $post)
    {
        $post = Post::published()->where('slug', $slug)->first();

        return view('publications.show', ['post' => $post]);
    }
}
