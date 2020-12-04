@extends('consumer.master_consumer')

@section("title")
    Profile
@endsection

@section('main')
    <main class="profile">
        <article>
            <div class="profile-card">
                <h1>Welcome back, <span>User</span></h1>
                <figure>
                    <img src="#" alt="Profile Pic">
                    <figcaption>User Name</figcaption>
                </figure>
            </div>
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
        </article>
        <article>
            <div class="graph">
                <h2>Amount of items per list</h2>
                <canvas id="item-graph"></canvas>
            </div>
            <div class="graph" hidden="hidden">
                <h2>Line Graph for time Taken for order to delivery per order</h2>
                <canvas id="time-graph"></canvas>
            </div>
        </article>
        <aside>
            <div>
                <h2>Ongoing orders</h2>
                @foreach($ongoing_orders as $id => $order)
                    <section class="profile-order">
                        <span class="fas fa-shopping-basket"></span>
                        <div>
                            <h3>Order {{$id}}</h3>
                            <p>Total Items: <span>{{count($order)}}</span></p>
                            <a class="button" href="{{route('open_order', [1, $id])}}">Open order</a>
                        </div>
                    </section>
                @endforeach
            </div>
            <div>
                <h2>Completed orders</h2>
                @foreach($completed_orders as $id => $order)
                    <section class="profile-order">
                        <span class="fas fa-shopping-basket"></span>
                        <div>
                            <h3>Order {{$id}}</h3>
                            <p>Total Items: <span>{{count($order)}}</span></p>
                        </div>
                    </section>
                @endforeach
            </div>
        </aside>
    </main>
@endsection

@section('js')
    <script type="module" src="{{asset('assets/js/modules/selectors.js')}}"></script>
    <script type="module" src="{{asset('assets/js/config/config.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="module" src="{{asset('assets/js/graphs.js')}}"></script>
@endsection
