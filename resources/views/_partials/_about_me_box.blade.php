<div class="column is-4 is-offset-1" id="aboutMe">
    <div class="card">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-48x48">
              <img src="/images/avatar.jpg" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-4">Naïm Khalifa</p>
            <p class="subtitle is-6"><a href="http://twitter.com/naim_khalifa">@naim_khalifa</a></p>
          </div>
        </div>

        <div class="content">
          Développeur web freelance à Bruxelles, je suis passionné par <a href="http://laravel.com" target="_blank">Laravel</a> et par tous les outils qui peuvent accélérer et améliorer le processus de création.
        </div>
      </div>
    </div>

    <h4 class="title is-5" id="articlesListHeader">Articles</h4>
    <ul>
      @if (Route::currentRouteName() == 'home')
        <li>Blog from scratch</li>
        <li><a href="/configurer-git-pour-déployer-sur-un-mutualisé-ovh">Configurer git pour déployer sur un mutualisé OVH</a></li>
      @else
        <li><a href="/">Blog from scratch</a></li>
        <li>Configurer git pour déployer sur un mutualisé OVH</li>
      @endif
    </ul>
</div>
