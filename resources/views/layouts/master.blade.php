<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>codeur.co</title>

    <!-- Font Awesome icons-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bulma css framework -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.min.css" />
    <!-- Blog specific styles -->
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body>
    @include('_partials._navigation_top')

    @yield('blog_post')

    @include('_partials._footer')

    @include('_partials._ga_tracking_code')
    
    <script src="/js/app.js"></script>
</body>
</html>