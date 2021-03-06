<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Bo Robbrecht"/>
    <meta name="description" content="As consumer, you are able to keep track of your list & order them with ease.">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/universal.css')}}">
    @yield('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/solid.css"
          integrity="sha384-yo370P8tRI3EbMVcDU+ziwsS/s62yNv3tgdMqDSsRSILohhnOrDNl142Df8wuHA+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/fontawesome.css"
          integrity="sha384-ijEtygNrZDKunAWYDdV3wAZWvTHSrGhdUfImfngIba35nhQ03lSNgfTJAKaGFjk2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
</head>
<body>
<header>
    <img src="{{asset("/assets/media/logo.svg")}}" height="300" width="300" alt="Logo Grocart">
    <nav>
        <a class="button" href="{{route('create_list', Auth::id())}}"><span class="fas fa-plus-circle"></span>New List</a>
        <a class="button" href="{{route('consumer_lists', Auth::id())}}"><span class="fas fa-list"></span>Lists</a>
        <a class="button" href="{{route('open_history', Auth::id())}}"><span class="fas fa-history"></span>History</a>
        <a class="button" href="{{route('consumer_profile', Auth::id())}}"><span class="fas fa-user"></span>Profile</a>
        <form method="post" action="{{ route('logout') }}" >
            @csrf
            <button class="button" type="submit"><span class="fas fa-sign-out-alt"></span>Logout</button>
        </form>
        <p class="name">Welcome {{collect(Auth::user()) -> get('name')}}</p>
    </nav>
</header>

@yield("main")

<footer>
    <figure>
        <img src="{{asset("/assets/media/logo.svg")}}" alt="Logo GroCart">
        <figcaption>GroCart Inc. All rights reserved</figcaption>
    </figure>
    <div>
        <p>Made by Bo Robbrecht</p>
        <p>All photos are take from <a href="https://www.pexels.com/">Pexels</a></p>
        <p><a href="https://www.pexels.com/license/">License</a></p>
    </div>
</footer>
@yield('js')
</body>
