@extends('layouts.front.post')

@section('blog_post')

@if (Auth::check() && Auth::user()->isAdmin())
<section class="container">
  <div class="columns">
    <div class="column notification is-default is-two-thirds">
      Vous êtes connecté en tant qu'admin. <a href="{{route('admin.posts.edit', $post->id)}}">Retour</a>
    </div>

    @if ($post->published_at == null)
    <div class="column is-one-third">
      <em><i class="fa fa-info"></i> Cet article est à l'état de brouillon.</em>  
    </div>    
    @endif
    
  </div>
</section>
@endif

<div class="container">
  <div class="columns">
    <main class="blog-post column is-7">
      <article>
        <header class="article-header">
          <h1 class="title is-1">{{$post->title}}</h1>
          <p class="subtitle is-3">{{$post->subtitle}}</p>
          <p class="article-metadata">
            @if ($post->published_at !== null)
              Posté le {{Date::parse($post->published_at)->format('l j F Y')}} | Par Naïm Khalifa</p>
            @endif
            @if ($post->intro !== null)
            <p class="hero-body">
              {{$post->intro}}
            </p>
            @endif
        </header>
        <div class="content">
          {!! $post->main_content_html !!}
        </div>
      </article>
    </main>
    <aside class="column is-4 is-offset-1">
      @include('_partials._aside_about_me')
      @include('_partials._aside_recent_articles')
    </aside>
  </div>
</div>

@endsection
