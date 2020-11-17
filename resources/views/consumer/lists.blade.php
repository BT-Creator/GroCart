@extends('consumer.master_consumer')

@section('title')
    Lists
@endsection

@section('main')
    <!-- This is just a mock for making the CSS -->
    <main id="grocery-lists">
        @for($i = 0; $i < 5; $i++)
            <article class="grocery-lists">
                <h1>List Name</h1>
                <div class="grocery-list-container">
                    @for($j = 0; $j < 2; $j++)
                        <section class="list-item">
                            <h2>Milk</h2>
                            <p>Just plain old milk.</p>
                        </section>
                        <section class="list-item">
                            <h2>Tresors</h2>
                            <p><span>Weight:</span> 1 KG</p>
                            <p><span>Brand:</span> Kellogs</p>
                        </section>
                        <section class="list-item">
                            <h2>American</h2>
                            <p><span class="list-property">Weight:</span> 0,200 KG</p>
                            <p><span class="list-property">Special Notes:</span> With unions</p>
                        </section>
                    @endfor
                </div>
                <div class="grocery-list-options">
                    <a href="{{route('open_list')}}"><span class="fas fa-edit"></span>Edit</a>
                    <a href="{{route('501_route')}}"><span class="fas fa-trash"></span>Delete</a>
                    <a href="{{route('501_route')}}">Order<span class="fas fa-arrow-right"></span></a>
                </div>
            </article>
        @endfor
    </main>

@endsection
