@extends('layouts.front.post')

@section('blog_post')

@if (Auth::user()->isAdmin())
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

<section class="blog-post">
  <div class="container">
    <div class="columns">
      <div class="column is-7">        
        <header class="article-header">
          <h1 class="title is-1">{{$post->title}}</h1>
          <h2 class="subtitle is-3">{{$post->subtitle}}
          </h2>
          <p class="article-metadata">
            @if ($post->published_at !== null)
              Posté le {{Date::parse($post->published_at)->format('l j F Y')}} | Par Naïm Khalifa</p>
            @endif
        </header>
        <div class="content">
          @if ($post->intro !== null)
            <section class="hero">
              <div class="hero-body">
                {{$post->intro}}
              </div>
            </section>
          @endif

          {!! $post->main_content_html !!}

        </div> 
      </div>

      @include('_partials._about_me_box')
    </div>
  </div>
</section>

@endsection
