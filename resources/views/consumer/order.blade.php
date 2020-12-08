@extends('consumer.master_consumer')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/consumer/order.css')}}">
@endsection

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
        <figure>
            <svg xmlns="http://www.w3.org/2000/svg" height="200" width="910">
                <g>
                    <circle r="50" cx="55" cy="100" stroke="black" stroke-width="5" fill-opacity="0.0" id="bar-payed"></circle>
                    <line stroke="black" stroke-width="5" x1="110" x2="200" y1="100" y2="100"></line>
                    <text x="23" y="105">Ordered</text>
                </g>
                <g>
                    <circle r="50" cx="255" cy="100" stroke="black" stroke-width="5" fill-opacity="0.0" id="bar-assigned"></circle>
                    <line stroke="black" stroke-width="5" x1="310" x2="400" y1="100" y2="100"></line>
                    <text x="220" y="105">Assigned</text>
                </g>
                <g>
                    <circle r="50" cx="455" cy="100" stroke="black" stroke-width="5" fill-opacity="0.0" id="bar-picking"></circle>
                    <line stroke="black" stroke-width="5" x1="510" x2="600" y1="100" y2="100"></line>
                    <text x="427" y="105">Picking</text>
                </g>
                <g>
                    <circle r="50" cx="655" cy="100" stroke="black" stroke-width="5" fill-opacity="0.0" id="bar-delivering"></circle>
                    <line stroke="black" stroke-width="5" x1="710" x2="800" y1="100" y2="100"></line>
                    <text x="617" y="105">Delivering</text>
                </g>
                <g>
                    <circle r="50" cx="855" cy="100" stroke="black" stroke-width="5" fill-opacity="0.0" id="bar-completed"></circle>
                    <text x="817" y="105">Delivered</text>
                </g>
            </svg>
        </figure>
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
        @if($details -> get('status') == 'delivering')
            <div id="map">

            </div>
        @endif
    </main>
@endsection

@section('js')
    @if($details -> get('status') == 'delivering')
        <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
        <script type="module" src="{{asset('assets/js/modules/location.js')}}"></script>
        <script type="module" src="{{asset("assets/js/location.js")}}"></script>
    @endif
@endsection
