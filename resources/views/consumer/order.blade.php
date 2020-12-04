@extends('consumer.master_consumer')

@section('title')
    Order
@endsection

@section('main')
    <main class="order-overview">
        <h1>Thank you for your order!</h1>
        @switch($details -> get('status'))
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
                @break
        @endswitch
        <aside>
            <section class="order-info">
                <h3>Store address</h3>
                <p><span>Street:</span>{{$details -> get('store_street')}}</p>
                <p><span>House Number:</span>{{$details -> get('store_house_number')}}</p>
                <p><span>Postal code:</span>{{$details -> get('store_postal_code')}}</p>
                <p><span>City:</span>{{$details -> get('store_city')}}</p>
                <p><span>Country:</span>{{$details -> get('store_country')}}</p>
            </section>
            <section class="order-info">
                <h3>Delivery address</h3>
                <p><span>Street:</span>{{$details -> get('delivery_street')}}</p>
                <p><span>House Number:</span>{{$details -> get('delivery_house_number')}}</p>
                <p><span>Postal code:</span>{{$details -> get('delivery_postal_code')}}</p>
                <p><span>City:</span>{{$details -> get('delivery_city')}}</p>
                <p><span>Country:</span>{{$details -> get('delivery_country')}}</p>
            </section>
        </aside>
    </main>
@endsection
