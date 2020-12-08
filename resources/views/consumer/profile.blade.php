@extends('consumer.master_consumer')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/consumer/profile.css')}}">
@endsection

@section("title")
    Profile
@endsection

@section('main')
    <main class="profile">
        <article>
            <div class="profile-card">
                <h1>Welcome back, <span>{{collect(Auth::user()) -> get('name')}}</span></h1>
                <figure>
                    <img src="#" alt="Profile Pic">
                    <figcaption>{{collect(Auth::user()) -> get('name')}}</figcaption>
                </figure>
            </div>
            <section>
                @if(empty(collect(collect($ongoing_orders) -> first()) -> first()))
                    <h2>Amount of lists made: <span>none</span></h2>
                    <h2>Items received: <span>none</span></h2>
                @else
                <h2>Amount of lists made: <span>{{count($ongoing_orders) + count($completed_orders)}} lists</span></h2>
                <h2>Items received: <span></span></h2>
                @endif
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
                @if(empty(collect(collect($ongoing_orders) -> first()) -> first()))
                    <p>No ongoing orders found.</p>
                @else
                    @foreach($ongoing_orders as $id => $order)
                        <section class="profile-order">
                            <span class="fas fa-shopping-basket"></span>
                            <div>
                                <h3>Order {{$id}}</h3>
                                <p>Total Items: <span>{{count($order)}}</span></p>
                                <p>Status: {{$status_data[$id]}}</p>
                                <a class="button" href="{{route('open_order', [Auth::id(), $id])}}">Open order</a>
                            </div>
                        </section>
                    @endforeach
                @endif
            </div>
            <div>
                <h2>Completed orders</h2>
                @if(empty(collect(collect($completed_orders) -> first()) -> first()))
                    <p>No completed orders found.</p>
                @else
                    @foreach($completed_orders as $id => $order)
                        <section class="profile-order">
                            <span class="fas fa-shopping-basket"></span>
                            <div>
                                <h3>Order {{$id}}</h3>
                                <p>Total Items: <span>{{count($order)}}</span></p>
                            </div>
                        </section>
                    @endforeach
                @endif
            </div>
        </aside>
    </main>
@endsection

@section('js')
    <script type="text/javascript">
        localStorage.setItem('id', {{Auth::id()}})
    </script>
    <script type="module" src="{{asset('assets/js/modules/selectors.js')}}"></script>
    <script type="module" src="{{asset('assets/js/config/config.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="module" src="{{asset('assets/js/graphs.js')}}"></script>
@endsection
