<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Bo Robbrecht"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/reset.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/neutralscreen.css")}}">
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
    <nav>
        <div><span class="fas fa-question"></span><a href="{{route("index_route")}}">About us</a></div>
        <div><span class="fas fa-key"></span><a href="#">Consumer</a></div>
        <div><span class="fas fa-key"></span><a href="#">Driver</a></div>
        <div><span class="fas fa-key"></span><a href="#">Store Owner</a></div>
    </nav>
</header>

@yield("main")

<footer>
    <figure>
        <img src="{{asset("/assets/media/logo.png")}}" alt="Logo GroCart">
        <figcaption>GroCart Inc. All rights reserved</figcaption>
    </figure>
    <aside>
        <p>Made by Bo Robbrecht</p>
        <p>All photo's are take from <a href="https://www.pexels.com/">Pexels</a></p>
        <p>For more information on the license, <a href="https://www.pexels.com/license/">click here</a>.</p>
    </aside>
</footer>
</body>
