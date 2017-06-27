<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


	public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return view('publications.show', ['post' => $post]);
    }

	public function create()
	{
		return view('admin.posts.create');
	}

	public function store(Request $request, User $user)
    {
    	$this->validate($request, [
		    'title' => 'required|unique:posts|max:255',
		    'subtitle' => 'required',
		    'main_content_markdown' => 'required',
		]);

        $this->post->slug = str_slug(request('title')); 
        $this->post->title = request('title');
        $this->post->subtitle = request('subtitle');
        $this->post->intro = request('intro');
        $this->post->main_content_markdown = request('main_content_markdown');
        $this->post->main_content_html = Markdown::convertToHtml(request('main_content_markdown'));

        $user = $user->find(Auth::id());
        $user->savePost($this->post);

        return redirect()->route('admin.posts.show', $this->post->id);
    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Request $request, User $user, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'main_content_markdown' => 'required',
        ]);

        $post = $this->post->find($id);

        $post->slug = str_slug(request('title'));
        $post->title = request('title');
        $post->subtitle = request('subtitle');
        $post->intro = request('intro');
        $post->main_content_markdown = request('main_content_markdown');
        $post->main_content_html = Markdown::convertToHtml(request('main_content_markdown'));

        if (request('publish') == 1 && $post->published_at == null) {
            $post->published_at = Carbon::now();
        }

        $user = $user->find(Auth::id());
        $user->savePost($post);

        return redirect()->route('admin.posts.show', $post->id);
    }

    public function destroy($id)
    {
        $post = $this->post->find($id);
        $post->delete($id);
        
        return redirect()->route('dashboard');
    }
}
