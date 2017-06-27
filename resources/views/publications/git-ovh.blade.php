@extends('layouts.front.post')

@section('blog_post')
  <section class="blog-post">
    <div class="container">
        <div class="columns">
            <div class="column is-7">
                <header class="article-header">
                    <h1 class="title is-1">Configurer git pour déployer sur un mutualisé OVH</h1>
                    <h2 class="subtitle is-3">Une méthode simple
                    </h2>
                    <p class="article-metadata">Posté le 13 juin 2017 | Par Naïm Khalifa</p>
                    </header>
                <div class="content">
                    <section class="hero">
                      <div class="hero-body">
                        <p>C'est le deuxième jour de mon aventure <em><a href="/">Blog from scratch</a></em> et la solution html simple commence évidemment à poser des problèmes au niveau de la duplication de code html. Je vais certainement basculer vers une solution moins archaïque très rapidement!</p>

                        <p>Mais avant ça, parlons du setup de git avec un mutualisé ovh. Ce sujet a déjà été traité en détails par d'autres blogeurs. Ces deux articles par exemple sont très utiles: <a href="https://www.alsacreations.com/article/lire/1647-Synchroniser-son-serveur-web-avec-Github.html" target="_blank">Synchroniser son serveur web avec Github</a> (par edenpulse sur Alsacréation) et <a href="https://blog.yadutaf.fr/2013/11/30/gerer-son-site-avec-git-sur-un-serveur-mutualise/" target="_blank">Gérer son site avec GIT sur un serveur mutualisé</a> (yadutaf.fr).</p>

                        <p>Le premier ne m'a pas vraiment permis d'aller très loin dans ma configuration, puisque (en mutualisé en tout cas), ovh me refuse le clonage d'un dépôt hébergé sur GitHub. Quoiqu'apparement, il y aurait une piste à creuser <a href="https://help.github.com/articles/using-ssh-over-the-https-port/" target="_blank">ici</a>.</p>
                        <p>Le deuxième article est assez intéressant et complet. Dans mon cas, les besoins étant plus restreints, j'ai réduit au minimum la configuration du  <em><a href="https://git-scm.com/book/en/v2/Customizing-Git-Git-Hooks">hook</a></em> <em><a href="https://git-scm.com/book/en/v2/Customizing-Git-Git-Hooks#__code_post_receive_code">post-receive</a></em>.</p>
                      </div>
                    </section>

                    <h3>Configuration de base du dépôt</h3>

                    <article class="media is-large">
                      <div class="media-left">
                        <p class="title is-5">1</p>
                      </div>
                      <div class="media-content">
                        <p class="title is-5">
                          Connexion 'ssh' sur le serveur OVH :
                        </p>
                        <p>Pour vous connecter en ligne de commande au serveur mutualisé OVH, vous aurez besoin de vos identifiants FTP. Vous aurez aussi besoin de connaitre le nom du cluster sur lequel se trouve votre hébergement (ça se trouve facilement dans le panneau d'administration OVH).</p>
                        <p>Voici à quoi doit ressembler la commande que vous taperez pour vous connecter.</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">$ ssh nomutilisateur@ftp.cluster007.ovh.net</code></pre></figure>

                        <p>Suite à quoi il vous demandera votre mot de passe:</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">$ nomutilisateur@ftp.cluster007.ovh.net's password:</code></pre></figure>
                        <p>Renseignez ce dernier pour finir de vous connecter sur le serveur distant.</p>
                      </div>
                    </article>

                    <article class="media is-large">
                      <div class="media-left">
                        <p class="title is-5">2</p>
                      </div>
                      <div class="media-content">
                        <p class="title is-5">
                          Création du dépôt git sur le serveur distant:
                        </p>
                        <p>Une fois que vous êtes connecté, vous pouvez créer un dossier dans lequel vous pourrez mettre tous vos dépôts git par la suite. J'ai personnellement créé un dossier 'repos'.</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">~ $ mkdir repos</code></pre></figure>

                        <p>Ensuite, il n'y a plus qu'à se placer dans le dossier ~/repos et à initialiser un nouveau dépôt --bare</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">~ $ cd repos</code></pre>
                            <pre><code class="language-bash" data-lang="bash">~ $ git init --bare codeur.co</code></pre></figure>
                        <p>Remplacer <em>codeur.co</em> dans cet exemple par ce que vous voulez utiliser comme nom pour votre dépot git.</p>

                        <p>Pour la troisième étape, il y a deux possibilités. </p>
                        <ul>
                            <li>Soit c'est un nouveau projet et il n'y a pas encore de dépôt git sur votre machine local pour ce dernier (<i class="fa fa-arrow-right"></i> <a href="#3a">3a</a>)</li>
                            <li>Soit vous avez déjà un dépôt git en local, sur lequel vous avez déjà travaillé et que vous aimeriez synchroniser avec votre dépôt distant (<i class="fa fa-arrow-right"></i> <a href="#3b">3b</a>)</li>
                        </ul>
                      </div>
                    </article>

                    <article class="media is-large">
                      <div class="media-left">
                        <p class="title is-5" id="3a">3a</p>
                      </div>
                      <div class="media-content">
                        <p class="title is-5">
                          Cloner le dépôt vide distant vers votre machine locale
                        </p>
                        <p>Depuis votre machine locale (vous n'êtes donc plus sur le serveur OVH), vous pouvez clôner le dépôt : </p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">~ $ git clone nomdutilisateur@ftp.cluster007.ovh.net:codeur.co</code></pre></figure>
                        <p>Le dépôt est cloné. Vous pouvez maintenant ajouter des fichiers de manière classique avec git. Il faut ensuite faire vos commits et publier sur la remote <em>origin</em>.</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">$ echo "#Readme de mon site" > README.md<br />$ git add -A<br />$ git commit -m "Add README file"<br />$ git push origin master</code></pre></figure>
                        <p>Félicitations. Vous avez maintenant une copie versionée de votre code sur le serveur distant. Mais le plus intéressant reste à venir !</p>
                      </div>
                    </article>

                    <article class="media is-large">
                      <div class="media-left">
                        <p class="title is-5" id="3b">3b</p>
                      </div>
                      <div class="media-content">
                        <p class="title is-5">
                          Cloner un dépôt local sur le serveur distant OVH
                        </p>
                        <p><em>(Si vous venez de faire les opérations du 3a, vous pouvez directement passer au point <a href="#4">4</a>)</em></p>

                        <p>Vous aurez besoin de connaitre le chemin absolu du dossier racine de votre dépôt git sur le serveur pour continuer. Voici Un example plus parlant (remplacez codeur.co par le nom que vous avez utilisé auparavant) :</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">#sur le serveur distant<br />~ $ cd ~/repos/codeur.co<br />~ $ pwd</code></pre></figure>

                        <p>... devrait vous donner quelque chose comme ça :</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">~ $ /homez.612/nomdutilisateur/repos/codeur.co</code></pre></figure>
                        <p>Ce qui vous servira pour la suite.</p>
                        <p>Maintenant, depuis votre machine locale (et plus sur le serveur OVH), vous pouvez ajouter la remote. Placer vous à la racine de votre projet versionné avec git. Et ajouter ensuite la remote.</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">~ $ cd Code/projet-machin-truc<br />~ $ git remote add ovh <br />ssh://nomdutilisateur@ftp.cluster007.ovh.net/homez.612/nomdutilisateur/repos/codeur.co</code></pre></figure>
                        <p>Vous pouvez ensuite faire un push de votre version locale vers le serveur distant avec:</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">~ $ git push --all ovh</code></pre></figure>
                      </div>
                    </article>

                    <h3>Automatiser les déploiement</h3>
                    <article class="media is-large">
                      <div class="media-left">
                        <p class="title is-5" id="4">4</p>
                      </div>
                      <div class="media-content">
                        <p class="title is-5">
                          Création du fichier post-receive
                        </p>
                        <p>Grâce au hook post-receive de git, on va pouvoir faire en sorte qu'à chaque push sur la remote ovh, le code soit aussi automatiquement mis à jour dans le dossier racine de votre site (est-ce que ça serait pas une phrase de gros geek ça, par hasard ?). Ce qui permet de se passer de client FTP et surtout de minimiser fortement les risques d'erreurs humaines, au moment de la mise en ligne des mises à jour que vous aurez apportées à votre site. En effet, qui n'a jamais écrasé des fichiers qui n'auraient jamais dû l'être, tout ça à cause de la combinaison fatale de la distraction et d'un glisser-déposer hasardeux ? Laissons les machines faire ces opérations hautement critiques. On va quand même les y aider un peu, rassurez-vous !</p>
                        <p>Là : </p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">#sur le serveur distant<br />~ $ cd ~/repos/codeur.co/hooks/<br />~ $ mv post-receive.sample post-receive</code></pre></figure>

                        <p>Ca aura pour effet d'activer le <a href="http://2static2.fjcdn.com/comments/Misfitsfan+used+roll+picture+misfitsfan+rolled+image+my+tinder+match+_7f0e21307ab2dac53559f294e7766a15.jpg" target="blank">hook</a> en question:</p>
                        <p>Enfin, il ne nous reste plus qu'à y ajouter le code qui nous permettra d'automatiser la mise à jour dans le dossier public. Editez le fichier <em>post-receive</em> :</p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">#!/bin/bash
working_dir_base="/homez.172/nomdutilisateur/www/_sites/codeur.co"

while read oldrev newrev refname
  do
  branch=$(git rev-parse --symbolic --abbrev-ref $refname)

  echo "Starting deployment..."

  GIT_WORK_TREE=$working_dir_base git checkout $branch -f
  NOW=$(date +"%Y%m%d-%H%M")
  git tag release_$NOW $branch

  echo "   /==============================="
  echo "   | Target branch: $branch"
  echo "   | Target folder: $working_dir_base"
  echo "   \=============================="

  echo "done !"
done</code></pre></figure>
                        <p>La dernière chose à faire est de permettre l'exécution de ce fichier : </p>
                        <figure class="highlight" style="box-shadow: none;">
                            <pre><code class="language-bash" data-lang="bash">~ $ chmod +x post-receive</code></pre></figure>
                      
                        <p>Voilà, en principe, tout devrait maintenant être fonctionnel. Lors de vos prochains push vers la remote ovh, votre code se mettra aussi à jour dans le dossier public.</p>
                        <p>N'hésitez pas à laisser vos commentaires si jamais vous rencontriez des difficultés !</p>

                        <a href="/"><i class="fa fa-long-arrow-left"></i> Blog from scratch</a>
                      </div>
                    </article>

                </div> 
            </div>

            @include('_partials._about_me_box')
        </div>
    </div>
</section>

@endsection
