<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Bo Robbrecht"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/consumer/consumerStyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/universalStyle.css')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/solid.css"
          integrity="sha384-yo370P8tRI3EbMVcDU+ziwsS/s62yNv3tgdMqDSsRSILohhnOrDNl142Df8wuHA+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/fontawesome.css"
          integrity="sha384-ijEtygNrZDKunAWYDdV3wAZWvTHSrGhdUfImfngIba35nhQ03lSNgfTJAKaGFjk2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
</head>
<body>
<header>
    <img src="{{asset("/assets/media/logo.svg")}}" height="300" width="300" alt="Logo Grocart">
    <nav>
        <a class="button" href="{{route('consumer_lists', 1)}}"><span class="fas fa-list"></span>Lists</a>
        <a class="button" href="{{route('501_route')}}"><span class="fas fa-history"></span>History</a>
        <a class="button" href="{{route('consumer_profile')}}"><span class="fas fa-user"></span>Profile</a>
        <a class="button" href="{{route('501_route')}}"><span class="fas fa-key"></span>Driver</a>
        <a class="button" href="{{route('501_route')}}"><span class="fas fa-key"></span>Store Owner</a>
        <a class="button" href="{{route("index_route")}}"><span class="fas fa-sign-out-alt"></span>Logout</a>
    </nav>
</header>

@yield("main")

<footer>
    <figure>
        <img src="{{asset("/assets/media/logo.svg")}}" alt="Logo GroCart">
        <figcaption>GroCart Inc. All rights reserved</figcaption>
    </figure>
    <aside>
        <p>Made by Bo Robbrecht</p>
        <p>All photos are take from <a href="https://www.pexels.com/">Pexels</a></p>
        <p>For more information on the license, <a href="https://www.pexels.com/license/">click here</a>.</p>
    </aside>
</footer>
@yield('js')
</body>
