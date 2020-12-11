@extends('consumer.master_consumer')

@section('main')
    <main>
        <article>
            <h1>Ongoing orders</h1>
            @if(empty(collect(collect($ongoing_orders) -> first()) -> first()))
                <p>No ongoing orders found.</p>
            @else
                @foreach($ongoing_orders as $id => $order)
                    <section class="profile-order">
                        <span class="fas fa-shopping-basket"></span>
                        <div>
                            <h2>Order {{$id}}</h2>
                            <p>Total Items: <span>{{count($order)}}</span></p>
                            <p>Status: {{$status_data[$id]}}</p>
                            <a class="button" href="{{route('open_order', [Auth::id(), $id])}}">Open order</a>
                        </div>
                    </section>
                @endforeach
            @endif
        </article>
        <article>
            <h1>Completed orders</h1>
            @if(empty(collect(collect($completed_orders) -> first()) -> first()))
                <p>No completed orders found.</p>
            @else
                @foreach($completed_orders as $id => $order)
                    <section class="profile-order">
                        <span class="fas fa-shopping-basket"></span>
                        <div>
                            <h2>Order {{$id}}</h2>
                            <p>Total Items: <span>{{count($order)}}</span></p>
                        </div>
                    </section>
                @endforeach
            @endif
        </article>
    </main>
@endsection
