@extends('consumer.master_consumer')

@section('main')
    <main>
        <form>
            <div>
                <a href="#"><span class="fas fa-plus-circle"></span>New Item</a>
                <label>
                    <span class="fas fa-hand-holding"></span>
                    Picking Method:
                    <input type="text" placeholder="As cheap as possible">
                </label>
            </div>
            <article>
                <h1>Items</h1>
                <div class="new-items-container">
                    <section>
                        <h2>Milk</h2>
                        <p>Just plain old milk.</p>
                    </section>
                    <section>
                        <h2>Tresors</h2>
                        <p><span class="list-property">Weight:</span> 1 KG</p>
                        <p><span class="list-property">Brand:</span> Kellogs</p>
                    </section>
                    <section>
                        <h2>American</h2>
                        <p><span class="list-property">Weight:</span> 0,200 gram</p>
                        <p><span class="list-property">Special Notes:</span> With unions</p>
                    </section>
                </div>
            </article>
            <article>
                <h1>Items in List</h1>
                <div class="List-items-container">
                    <section>
                        <h2>Milk</h2>
                        <p>Just plain old milk.</p>
                    </section>
                    <section>
                        <h2>Tresors</h2>
                        <p><span class="list-property">Weight:</span> 1 KG</p>
                        <p><span class="list-property">Brand:</span> Kellogs</p>
                    </section>
                    <section>
                        <h2>American</h2>
                        <p><span class="list-property">Weight:</span> 0,200 gram</p>
                        <p><span class="list-property">Special Notes:</span> With unions</p>
                    </section>
                </div>
            </article>
        </form>
        <article>
            <h1></h1>
        </article>
        <article>

        </article>
    </main>
@endsection
