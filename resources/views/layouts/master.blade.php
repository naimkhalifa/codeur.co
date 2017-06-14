<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Codeur.co est le site open source d'un développeur web qui veut partager son expérience autour d'un blog développé from scratch.">

    <title>codeur.co</title>

    <!-- Font Awesome icons-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bulma css framework -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.min.css" />
    <!-- Blog specific styles -->
    <link rel="stylesheet" href="/css/app.css" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00d1b2">
    <meta name="theme-color" content="#00d1b2">
</head>
<body>
    @include('_partials._navigation_top')

    @yield('blog_post')

    @include('_partials._footer')

    @include('_partials._ga_tracking_code')
    
    <script src="/js/app.js"></script>
</body>
</html>