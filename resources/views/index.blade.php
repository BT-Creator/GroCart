@extends("master_neutral")

@section("main")
    <div>
        <img src="{{asset("/assets/media/logo.svg")}}" height="300px" width="300px" alt="Logo Grocart">
        <h1>Grocart</h1>
    </div>
    <main>
        <section>
            <img src="{{asset("images/driver.jpg")}}" alt="Person driving his car">
            <h2>Driver</h2>
            <p>As a driver for Grocart, you can work at your own pace with flexible hours. You can choose when, where,
                and how you work.</p>
            <p>And when things go sideways, our team is here to help you with the aftershocks.</p>
            <a href="#">Driver</a>
        </section>
        <section>
            <img src="{{asset("images/consumer.jpg")}}" alt="Person holding shopping bag">
            <h2>Consumer</h2>
            <p>In these troubling times, online shopping is becoming much more prevalent.
                But yet for your daily groceries, you'll still have to go the old-fashion way. </p>
            <p>We at Grocart want to revolutionize this process. We want to make buying groceries as easy as counting.
                Our UI and Lists system makes creating and keeping track of orders simple and helps you focus on the
                important things in life.</p>
            <a href="#">Consumer</a>
        </section>
        <section>
            <img src="{{asset("images/store_owner.jpg")}}" alt="Photo of cashier stand">
            <h2>Store Owner</h2>
            <p>Reach a wider audience with Grocart. With Grocart, you can have a clear oversight of the health of your
                business.You can see incoming orders for your business and prepare them to help your drivers and ensure
                timely delivery for your clients.</p>
            <a href="#">Store owner</a>
        </section>
    </main>
@endsection
