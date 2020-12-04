@extends("general.master_neutral")

@section("main")
    <figure>
        <img src="{{asset("/assets/media/logo.svg")}}" height="300" width="300" alt="Logo Grocart">
        <figcaption>Grocart</figcaption>
    </figure>
    <main>
        <img src="{{asset("images/driver.jpg")}}" alt="Person driving his car">
        <article>
            <h1>Driver</h1>
            <p>As a driver for Grocart, you can work at your own pace with flexible hours. You can choose when,
                where,
                and how you work.</p>
            <p>And when things go sideways, our team is here to help you with the aftershocks.</p>
            <div class="button"><span class="fas fa-key"></span><a href="{{route('501_route')}}">Driver</a></div>
        </article>
        <img src="{{asset("images/consumer.jpg")}}" alt="Person holding shopping bag">
        <article>
            <h1>Consumer</h1>
            <p>In these troubling times, online shopping is becoming much more prevalent.
                But yet for your daily groceries, you'll still have to go the old-fashion way. </p>
            <p>We at Grocart want to revolutionize this process. We want to make buying groceries as easy as
                counting.
                Our UI and Lists system makes creating and keeping track of orders simple and helps you focus on the
                important things in life.</p>
            <div class="button"><span class="fas fa-key"></span><a href="{{route("consumer_lists", [1])}}">Consumer</a></div>
        </article>
        <img src="{{asset("images/store_owner.jpg")}}" alt="Photo of cashier stand">
        <article>
            <h1>Store Owner</h1>
            <p>Reach a wider audience with Grocart. With Grocart, you can have a clear oversight of the health of
                your
                business. You can see incoming orders for your business and prepare them to help your drivers and
                ensure
                timely delivery for your clients.</p>
            <div class="button"><span class="fas fa-key"></span><a href="{{route("501_route")}}">Store Owner</a></div>
        </article>
    </main>
@endsection
