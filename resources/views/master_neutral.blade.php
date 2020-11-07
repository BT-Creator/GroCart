<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Bo Robbrecht"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/reset.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/neutralscreen.css")}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GroCart: Remote Grocery Shopping</title>
</head>
<body>
<header>
<figure>
    <img src="{{asset("/assets/media/logo.png")}}" alt="Logo GroCart">
    <figcaption>GroCart</figcaption>
</figure>
    <nav>
        <a href="{{route("index")}}">About us</a>
        <a href="#">Consumer</a>
        <a href="#">Driver</a>
        <a href="#">Store Owner</a>
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
