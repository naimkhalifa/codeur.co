@extends('layouts.back.master')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-2">Admin Dashboard</h1>

        <h2 class="title is-4">Derniers Articles</h2>

		@if ($posts->count() > 0)
			<strong>{{$posts->count()}}</strong> articles sur le site.

			<table class="table is-bordered">
	          <thead>
	            <tr>
	              <th>Title</th>
	              <th>Extrait</th>
	              <th>Publié le</th>
	              <th>Actions</th>
	            </tr>
	          </thead>
	          <tbody>
				@foreach ($posts as $post)
	            <tr>
	              <td><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></td>
	              <td>{{str_limit($post->intro, 50)}}</td>
	              <td>{{$post->formatted_date}}</td>
	              <td>
	              	<a class="button" href="{{route('admin.posts.edit', $post->id)}}"><i class="fa fa-pencil"></i></a>
	              	<a class="button" href="{{route('admin.posts.show', $post->id)}}"><i class="fa fa-eye"></i></a>
	              	<form action="{{route('admin.posts.delete', $post->id)}}" style="display: inline;" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="button is-danger" onclick="return confirm('Etes-vous certain?');"><i class="fa fa-trash"></i></button>
					</form>
	              </td>
	            </tr>
				@endforeach
	          </tbody>
	        </table>
		@else	
			<article class="message is-primary">
				<div class="message-body">
					Il n'y a pas encore d'article.
				</div>
			</article>
		@endif

        <a href="{{route('admin.posts.create')}}">Nouvel article</a>
    </div>
</div>
@endsection
