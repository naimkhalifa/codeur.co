@if ($errors->any())
<article class="message is-danger">
	<div class="message-body">
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
</article>
@endif

<form action="{{Route::currentRouteName() == 'admin.posts.create' ? route('admin.posts.store') : route('admin.posts.update', $post->id)}}" method="POST">
	{{ csrf_field() }}

	<div class="field">
		<label class="label">Titre</label>
		<p class="control">
			<input class="input" type="text" name="title" placeholder="Titre" value="{{old('title', isset($post) ? $post->title : '')}}">
		</p>
	</div>

	<div class="field">
		<label class="label">Sous-titre</label>
		<p class="control">
			<input class="input" type="text" name="subtitle" placeholder="Sous-titre" value="{{old('subtitle', isset($post) ? $post->subtitle : '')}}">
		</p>
	</div>

	<div class="field">
		<label class="label">Intro</label>
		<p class="control">
			<textarea class="textarea" name="intro" placeholder="L'introduction de votre article">{{old('intro', isset($post) ? $post->intro : '')}}</textarea>
		</p>
	</div>

	<div class="field">
		<label class="label">Contenu principal <small>(markdown)</small></label>
		<p class="control">
			<textarea class="textarea" name="main_content_markdown" placeholder="Contenu principal de votre article">{{old('main_content_markdown', isset($post) ? $post->main_content_markdown : '')}}</textarea>
		</p>
	</div>

	<div class="field">
		<p class="control">

			@if (Route::currentRouteName() == 'admin.posts.edit')
				<div class="field">
				  <label class="label">Publier l'article</label>
				  <p class="control">
				    <label class="radio">
				      <input type="radio" value="1" name="publish" {{old('publish') == '1' ? 'checked' : (isset($post) && $post->published_at !== null) ? 'checked' : ''}}>
				      	Oui
				    </label>
				    <label class="radio">
				      <input type="radio" value="0" name="publish" {{old('publish') == '0' ? 'checked' : (isset($post) && $post->published_at == null) ? 'checked' : ''}}>
						Non
				    </label>
				  </p>
				</div>
			@endif

			<button class="button is-primary">Valider</button>
		</p>
	</div>
</form>