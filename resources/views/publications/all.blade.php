@extends('layouts.front.post')

@section('blog_post')

<div class="container">
  <div class="columns">
    <main class="blog-post column is-7">
      @foreach ($posts as $post)
        <article>
          <header class="article-header">
            <h1 class="title is-1">{{$post->title}}</h1>
            <p class="subtitle is-3">{{$post->subtitle}}</p>
            <p class="article-metadata">
              @if ($post->published_at !== null)
                Posté le {{Date::parse($post->published_at)->format('l j F Y')}} | Par Naïm Khalifa</p>
              @endif
              @if ($post->intro !== null)
              <span class="hero-body">
                {!! str_limit($post->intro, 300) !!}
              </span>
              <div>
                <a href="{{route('posts.show', $post->slug)}}">Lire l'article</a>
              </div>
              @endif
          </header>
        </article>
      @endforeach
    </main>
    <aside class="column is-4 is-offset-1">
      @include('_partials._aside_about_me')
      @include('_partials._aside_recent_articles')
    </aside>
  </div>
</div>

@endsection
