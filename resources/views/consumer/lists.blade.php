@extends('consumer.master_consumer')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/consumer/lists.css')}}">
@endsection

@section('title')
    Lists
@endsection

@section('main')
    <main class="list-overview">
        @if(empty(collect(collect($orders) -> first()) -> first()))
            <article class="empty-lists">
                <h1>No list found :(</h1>
                <p>How about creating one?</p>
                <a class="button" href="{{route('create_list', Auth::id())}}"><span class="fas fa-plus-circle"></span>New List</a>
            </article>
        @else
            @foreach($orders as $order)
            <article class="grocery-lists">
                <h1>List</h1>
                <div class="grocery-list-container" >
                    @foreach($order as $item)
                        <section class="list-item">
                            <h2>{{str_replace('_', ' ', $item['name'])}}</h2>
                            @isset($item['brand'])
                                <p><span class="list-property">Brand:</span>{{str_replace('_', ' ', $item['brand'])}}</p>
                            @endisset
                            @isset($item['weight'])
                                <p><span class="list-property">Weight:</span>{{$item['weight']}}</p>
                            @endisset
                            @isset($item['note'])
                                <p><span class="list-property">Note:</span>{{str_replace('_', ' ', $item['note'])}}</p>
                            @endisset
                            @if(!isset($item['brand']) && !isset($item['weight']) && !isset($item['note']))
                                <p>Just plain old {{$item['name']}}</p>
                            @endisset
                        </section>
                    @endforeach
                </div>
                <div class="grocery-list-options">
                    <a class="button" href="{{route('open_list', [Auth::id(), $order[0]['order_id']])}}"><span class="fas fa-edit"></span>Edit</a>
                    <a class="button" href="{{route('delete_list', [Auth::id(), $order[0]['order_id']])}}"><span class="fas fa-trash"></span>Delete</a>
                    <a class="button" href="{{route('make_order', [Auth::id(), $order[0]['order_id']])}}">Order<span class="fas fa-arrow-right"></span></a>
                </div>
            </article>
            @endforeach
        @endif
    </main>
@endsection
