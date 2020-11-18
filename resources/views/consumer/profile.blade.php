@extends('consumer.master_consumer')

@section("title")
    Profile
@endsection

@section('main')
    <main class="profile">
        <article>
            <h1>Welcome back, <span>User</span></h1>
            <div class="profile-card">
                <figure>
                    <img src="#" alt="Profile Pic">
                    <figcaption>User Name</figcaption>
                </figure>
                <section>
                    <h2>Amount of lists made: <span>40 Lists</span></h2>
                    <h2>Items received: <span>1534 items</span></h2>
                    <h2>Joined since
                        <time datetime="2019-12-01 07:00">2019-12-01</time>
                    </h2>
                    <form>
                        <input type="file">
                        <input type="submit" value="Upload" class="button">
                    </form>
                </section>
            </div>
            <section>
                <h2>Amount of items per list</h2>
            </section>
            <section>
                <h2>Line graph of goods received per order</h2>
            </section>
            <section>
                <h2>Line Graph for time Taken for order to delivery per order</h2>
            </section>
        </article>
        <aside>
            @for($i = 0; $i < 5; $i++)
                <section>
                    <span class="fas fa-shopping-basket"></span>
                    <h3>Order on 26/09/20</h3>
                    <p>Total Items: <span>26</span></p>
                </section>
            @endfor
        </aside>
    </main>
@endsection
