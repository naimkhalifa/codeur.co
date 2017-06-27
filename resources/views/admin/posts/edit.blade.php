@extends('layouts.back.master')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-2"><a href="{{route('dashboard')}}">Articles</a></h1>

        <h2 class="title is-4">Editer l'article</h2>

        @include('admin.posts._post_form', ['post' => $post])


    </div>
</div>
<div class="columns" style="margin-top: 100px;">
	<div class="column">
	    <article class="message is-danger">
		  <div class="message-body">
		    Supprimer l'article ?
		  </div>
		</article>
		<form action="{{route('admin.posts.delete', ['id' => $post->id])}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button type="submit" class="button is-danger" onclick="return confirm('Etes-vous certain?');">Supprimer</button>
		</form>
	</div>
</div>
@endsection