<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel | codeur.co</title>

    <!-- Font Awesome icons-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bulma css framework -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.min.css" />
    <!-- Blog specific styles -->
    <link rel="stylesheet" href="/css/app.css" />

    <link rel="stylesheet" href="/css/admin.css" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00d1b2">
    <meta name="theme-color" content="#00d1b2">
</head>
<body>
    <div class="columns">
        <aside class="column is-2 aside hero is-fullheight is-hidden-mobile">
        <div>
            <div class="main">
                <a href="{{route('dashboard')}}" class="item active"><span class="icon"><i class="fa fa-home"></i></span><span class="name">Dashboard</span></a>
                <a href="{{route('dashboard')}}" class="item"><span class="icon"><i class="fa fa-pencil"></i></span><span class="name">Articles</span></a>
                <a class="item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <span class="icon"><i class="fa fa-sign-out"></i></span>
                    <span class="name">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        </aside>

        <div class="column is-10 admin-panel">
            <nav class="nav has-shadow" id="top">
                <div class="container">
                  <div class="nav-left">
                    <a class="nav-item" id="logo">
                        <strong>{</strong> codeur.co <strong>}</strong>
                    </a>
                  </div>
                  <span class="nav-toggle" id="navigationToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                  </span>
                  <div class="nav-right nav-menu is-hidden-tablet">
                    <a href="{{route('dashboard')}}" class="nav-item is-active">
                        Dashboard
                    </a>
                    <a href="{{route('dashboard')}}" class="nav-item">
                        Articles
                    </a>
                    <a href="{{ route('logout') }}" class="nav-item"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Logout
                    </a>
                  </div>
                </div>
              </nav>
           
            <section class="section">
                @yield('content')
            </section>
        </div>

        
    </div>


    @include('_partials._footer')
    
    <script src="/js/app.js"></script>
</body>
</html>