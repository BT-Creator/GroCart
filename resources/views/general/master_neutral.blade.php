<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Bo Robbrecht"/>
    <meta name="description" content="Grocart delivers the essentials within one click! With Grocart, you can do grocery shopping with ease.">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/reset.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/neutral.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/universal.css")}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/solid.css"
          integrity="sha384-yo370P8tRI3EbMVcDU+ziwsS/s62yNv3tgdMqDSsRSILohhnOrDNl142Df8wuHA+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/fontawesome.css"
          integrity="sha384-ijEtygNrZDKunAWYDdV3wAZWvTHSrGhdUfImfngIba35nhQ03lSNgfTJAKaGFjk2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GroCart: Remote Grocery Shopping</title>
</head>
<body>
<header>
    <img src="{{asset("/assets/media/logo.svg")}}" height="300" width="300" alt="Logo Grocart">
    @if(Auth::check())
        <nav>
            <a class="button" href="{{route("consumer_lists", [Auth::id()])}}"><span class="fas fa-home"></span>Home</a>
            <form method="post" action="{{ route('logout') }}" >
                @csrf
                <button class="button" type="submit"><span class="fas fa-sign-out-alt"></span>Logout</button>
            </form>

            <p class="name">Welcome {{collect(Auth::user()) -> get('name')}}</p>
        </nav>
    @else
        <nav>
            <a class="button" href="{{route("index_route")}}"><span class="fas fa-question"></span>About us</a>
            <a class="button" href="{{route('login')}}"><span class="fas fa-key"></span>Consumer</a>
            <a class="button" href="{{route("501_route")}}"><span class="fas fa-key"></span>Driver</a>
            <a class="button" href="{{route("501_route")}}"><span class="fas fa-key"></span>Store Owner</a>
        </nav>
    @endif

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
</body>
