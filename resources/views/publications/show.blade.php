@extends('layouts.front.post')

@section('blog_post')
<section class="blog-post">
  <div class="container">
    <div class="columns">
      <div class="column is-7">
        <header class="article-header">
          <h1 class="title is-1">{{$post->title}}</h1>
          <h2 class="subtitle is-3">{{$post->subtitle}}
          </h2>
          <p class="article-metadata">Posté le {{$post->created_at}} | Par Naïm Khalifa</p>
        </header>
        <div class="content">
          <section class="hero">
            <div class="hero-body">
              {{$post->intro}}
            </div>
          </section>

          {{$post->main_content_html}}

        </div> 
      </div>

      @include('_partials._about_me_box')
    </div>
  </div>
</section>

@endsection
