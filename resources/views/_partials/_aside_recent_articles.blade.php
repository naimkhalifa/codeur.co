<section>
  <h1 class="title is-5" id="articlesListHeader">Articles récents</h1>
  <ul>
    @foreach ($latestPosts as $post)
      <li><a href="/articles/{{$post->slug}}">{{$post->title}}</a></li>
    @endforeach

   {{--  @if (Route::currentRouteName() == 'home')
      <li>Blog from scratch</li>
      <li><a href="/configurer-git-pour-déployer-sur-un-mutualisé-ovh">Configurer git pour déployer sur un mutualisé OVH</a></li>
    @else
      <li><a href="/">Blog from scratch</a></li>
      <li>Configurer git pour déployer sur un mutualisé OVH</li>
    @endif --}}
  </ul>
</section>