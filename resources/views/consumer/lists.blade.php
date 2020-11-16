@extends('consumer.master_consumer')

@section('main')
    <!-- This is just a mock for making the CSS -->
    <main>
        @for($i = 0; $i < 5; $i++)
            <article class="grocery-list-overview">
                <h1>List Name</h1>
                <div>
                    @for($j = 0; $j < 2; $j++)
                        <section>
                            <h2>Milk</h2>
                            <p>Just plain old milk.</p>
                        </section>
                        <section>
                            <h2>Tresors</h2>
                            <p><span>Weight:</span> 1 KG</p>
                            <p><span>Brand:</span> Kellogs</p>
                        </section>
                        <section>
                            <h2>American</h2>
                            <p><span>Weight:</span> 0,200 gram</p>
                            <p><span>Special Notes:</span> With unions</p>
                        </section>
                    @endfor
                </div>
                <span class="fas fa-edit"></span><a href="{{route('501_route')}}">Edit</a>
                <span class="fas fa-trash"></span><a href="{{route('501_route')}}">Delete</a>
                <span class="fas fa-trash"></span><a href="{{route('501_route')}}">Order</a><span
                    class="fas fa-arrow-right"></span>
            </article>
        @endfor
    </main>

@endsection
