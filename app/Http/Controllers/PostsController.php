<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function show($id, Post $post)
    {
        $post = Post::published()->findOrFail($id);

        return view('publications.show', ['post' => $post]);
    }

    public function store(Post $post, User $user)
    {
        $user = $user->find(Auth::id());

        $post->title = request('title');
        $post->subtitle = request('subtitle');
        $post->main_content_markdown = request('main_content_markdown');
        $post->main_content_html = Markdown::convertToHtml(request('main_content_markdown'));

        $user->savePost($post);
    }
}
