@extends('layouts.master')

@section('blog_post')
<section class="blog-post">
  <div class="container">
    <div class="columns">
      <div class="column is-7">
        <header class="article-header">
          <h1 class="title is-1">Blog from scratch</h1>
          <h2 class="subtitle is-3">Naissance d'un blog sur le développement, qui se développe en parlant de lui-même.<br />
          </h2>
          <p class="article-metadata">Posté le 12 juin 2017 | Par Naïm Khalifa</p>
        </header>
        <div class="content">
          <section class="hero">
            <div class="hero-body">
              <p>Si ça c'est pas une tagline, je m'y connais pas! On se croirait presque dans <em>Inception</em>, le côté incompréhensible en moins.</p>
              <p>Permettez-moi de vous expliquer l'idée ce qui se cache derrière ce sous-titre alambiqué,
                que certains ne manqueront pas de qualifier de fumisterie.</p>
              </div>
          </section>
          <h3>Quelle solution pour mon blog ?</h3>
          <p>
            Je me suis longtemps posé la question de savoir quelle était la plateforme à choisir pour mon blog.
            En général, quand on pense <em>blog</em>, la chose suivante qui vient à l'esprit, c'est <em>WordPress</em>.
            Ceci dit, bien qu'il s'agisse d'un outil taillé sur mesure pour la gestion de ce type de contenu,
            j'ai un problème éthique avec WordPress. Il fait le job, mais j'ai toujours l'impression de tuer une mouche
            avec un bazouka quand je dois utiliser cet outil. Ceci dit, je l'avoue, j'ai utilisé WordPress pour me lancer à une époque lointaine dans l'aventure de la création de contenu (un blog sur <a href="http://www.developpeurphp.be" target="_blank">Laravel</a>). Bien que n'ayant posté que peu d'articles, je dois admettre que WordPress m'a bien aidé dans mon processus d'édition de contenu. Et c'est normal, il est fait pour ça.</p>

            <p>Récemment, je me suis intéressé à <a href="https://jekyllrb.com/" target="_blank">jekyll</a>. Cet outil, derrière lequel se cachent les gens de chez GitHub est beaucoup plus efficace en termes de performances. Il est plus difficile à prendre en main et est clairement destiné à un public plus averti, avec des compétences en développement. Mais le fait que jekyll génère du contenu statique html et qu'ensuite le serveur n'ait plus qu'à se contenter de servir sur un plateau ce contenu statique est un concept qui me plait vraiment.</p>

            <p>Il y a pléthore d'autres outils ou plateformes en ligne pour celui qui ressent l'envie de s'exprimer au travers d'un blog. Je ne développerai pas ici, parce que ça n'est pas l'objet de cet article. Mais on pourrait citer par exemple <a href="https://craftcms.com/" target="_blank">Craft cms</a>, <a href="https://ghost.org/fr/" target="_blank">ghost</a> ou encore <a href="https://medium.com/" target="_blank">Medium</a>.</p>

            <p>Tout ça ne convient pas au projet que je souhaite développer avec ce site.</p>

            <h3>Heu, au fait... il parle de quoi ton blog ?</h3>

            <p>La vrai question c'est: "Qu'est-ce que je veux faire avec ce blog ?". <br />
              Déjà, parler un peu moins de moi et un peu plus de développement web :) Revenons-donc à nos moutons.</p>

            <p>En gros, le but va être de faire évoluer ce site en fonction des besoins (ça paraît logique). Un deuxième objectif sera de partager 
              le code source et d'écrire des articles pour chacune des évolutions du site. Je ne sais pas où on va, 
              mais on y va ! </p>

            <h3>Quelles technologies utiliser ?</h3>
            <p>Pour ce premier article, voici la liste des besoins fonctionnels que j'ai établi :</p>

            <ul>
              <li>Des contenus corrects d'un point de vue sémantique</li>
              <li>Un <a href="http://bulma.io" target="_blank" title="Bulma">framework css moderne</a>, prenant en charge le responsive design (pléonasme alert!)</li>
              <li>Un peu de javascript pour gérer le menu hamburger sur les petites résolutions</li>
            </ul>

            <p>Vous allez rire, mais c'est tout ce dont j'ai besoin à l'heure actuelle. En tout cas, ça fera parfaitement 
              l'affaire pour une première version.</p>
            <p>Les besoins sont comblés avec une page html statique, un peu de css et un peu de js. Attention, mon but n'est pas de faire du web comme en 2001, en codant chaque page html à la main et en hackant mes feuilles de styles pour tenter d' avoir un rendu correct avec Internet Explorer 6 (merci encore à toi, <a href="https://i.ytimg.com/vi/O3LnqmNeois/maxresdefault.jpg">Bill</a>). Le fait est que tout ça va évoluer vers autre chose. Mais l'expérience me semble intéressante ; se concentrer sur l'essentiel et faire des ajouts au fur et à mesure.</p>

            <h3>Et après ?</h3>
            <p>Je vous le concède, à l'heure actuelle, le <a href="https://github.com/naimkhalifa/codeur.co/tree/v0.1">code source</a> n'est pas des plus excitants. Mais tout ça va évoluer! Je vous invite à me laisser vos commentaires et suggestions en tout genre. Mais pas tout de suite (puisque c'est impossible). L'ajout d'un module de commentaires fera l'objet d'un futur article :D</p>                        

            <a href="/configurer-git-pour-déployer-sur-un-mutualisé-ovh"><i class="fa fa-long-arrow-right"></i> Configurer git pour déployer sur un mutualisé OVH</a>
          </div> 
        </div>

        @include('_partials._about_me_box')

      </div>
    </div>
</section>
@endsection