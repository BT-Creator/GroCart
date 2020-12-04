@extends('consumer.master_consumer')

@section('main')
    <main>
        <h1>Thank you for your order!</h1>
        @switch(collect($details) -> get('status'))
            @case('ordered')
                <h2>Your list has been ordered</h2>
                @break
            @case('assigned_to_driver')
                <h2>Your order has been assigned to a driver</h2>
                @break
            @case('picking')
                <h2>Your order is being prepared by the shop owner & driver</h2>
                @break
            @case('delivering')
                <h2>The driver is going on the way to your home</h2>
                @break
            @case('completed')
                <h2>Your order has been delivered</h2>
        @endswitch
        <article>
            <h3>Order info</h3>
            <section>
                <h4>Store address</h4>
                <p><span>Street</span></p>
            </section>
            <section>
                <h4>Delivery address</h4>
            </section>
        </article>
    </main>
@endsection
