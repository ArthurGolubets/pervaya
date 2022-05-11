<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$titlePage??setting('seo.title')}}</title>
    <meta property='og:image' content='{{asset(setting('seo.ogg_image'))}}' />

    <meta name="keywords" content="{{$keywordsPage??setting('seo.keywords')}}" />

    <meta name="description" content="{{$descriptionPage??setting('seo.description')}}" />

    <link rel="apple-touch-icon" type="image/vnd.microsoft.icon" sizes="76x76" href="{{asset(setting('global.favicon'))}}">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset(setting('global.favicon'))}}">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="{{asset(setting('global.favicon'))}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="76x76" href="{{asset(setting('global.favicon'))}}">
    <link rel="icon" type="image/x-icon" href="{{asset(setting('global.favicon'))}}">
    {{--    <link type="text/css" rel="stylesheet" href="css/lightgallery.css" />--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(setting('global.favicon'))}}">

    <!-- Bootstrap CDN CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Custom CSS -->
    <link href="{{asset('css/404.min.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Preloader -->
<section id="wrapper" class="container-fluid">
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class="text-danger">404</h1>
            <h3>Опаньки!</h3>
            <p class="text-muted m-t-30 m-b-30">Страница на которую Вы ссылаетесь не существует</p>
            <a href="{{route('home')}}" class="btn btn-danger btn-rounded m-b-40">На главную</a> </div>
    </div>
</section>
</body>
</html>
