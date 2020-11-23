@extends('consumer.master_consumer')

@section('title')
    Lists
@endsection

@section('main')
    <main id="grocery-lists">
        @foreach($orders as $order)
            <article class="grocery-lists">
                <h1>List</h1>
                <div class="grocery-list-container">
                    @foreach($order as $item)
                    <section class="list-item">
                        <h2>{{$item['name']}}</h2>
                        @isset($item['brand'])
                            <p><span class="list-property">Brand:</span>{{$item['brand']}}</p>
                        @endisset
                        @isset($item['weight'])
                            <p><span class="list-property">Weight:</span>{{$item['weight']}}</p>
                        @endisset
                        @isset($item['note'])
                            <p><span class="list-property">Note:</span>{{$item['note']}}</p>
                        @endisset
                        @if(!isset($item['brand']) && !isset($item['weight']) && !isset($item['note']))
                            <p>Just plain old {{$item['name']}}</p>
                        @endisset
                    </section>
                    @endforeach
                </div>
                <div class="grocery-list-options">
                    <a class="button" href="{{route('open_list')}}"><span class="fas fa-edit"></span>Edit</a>
                    <a class="button" href="{{route('501_route')}}"><span class="fas fa-trash"></span>Delete</a>
                    <a class="button" href="{{route('501_route')}}">Order<span class="fas fa-arrow-right"></span></a>
                </div>
            </article>
        @endforeach
    </main>

@endsection
