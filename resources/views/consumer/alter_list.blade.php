@extends('consumer.master_consumer')

@section('main')
    <main>
        <form>
            <div>
                <a href="#"><span class="fas fa-plus-circle"></span>New Item</a>
                <label for="picking_method">
                    <span class="fas fa-hand-holding"></span>
                    Picking Method:
                    <input type="text" placeholder="As cheap as possible" name="picking_method">
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
            <article>
                <h3>Store Address:</h3>
                <label for="store_address">
                    Street:
                    <input type="text" placeholder="street" name="store_address" required="required">
                </label>
                <label for="store_number">
                    Number:
                    <input type="number" name="store_number" required="required">
                </label>
                <label for="store_postal_code">
                    Postal code:
                    <input type="number" name="store_postal_code" required="required">
                </label>
                <label for="store_city">
                    City:
                    <input type="text" name="store_city" required="required">
                </label>
                <label for="store_country">
                    Country:
                    <input type="text" name="store_country" required="required">
                </label>
            </article>
            <article>
                <h3>Delivery address:</h3>
                <label for="delivery_address">
                    Street:
                    <input type="text" placeholder="street" name="delivery_address" required="required">
                </label>
                <label for="delivery_number">
                    Number:
                    <input type="number" name="delivery_number" required="required">
                </label>
                <label for="delivery_postal_code">
                    Postal code:
                    <input type="number" name="delivery_postal_code" required="required">
                </label>
                <label for="delivery_city">
                    City:
                    <input type="text" name="delivery_city" required="required">
                </label>
                <label for="delivery_country">
                    Country:
                    <input type="text" name="delivery_country" required="required">
                </label>
            </article>
            <article>
                <h3>Delivery Notes</h3>
                <label for="delivery_notes">
                    <input type="text" name="delivery_notes">
                </label>
            </article>
            <article>
                <h3>Medical Notes</h3>
                <label for="medical_notes">
                    <input type="text" name="medical_notes">
                </label>
            </article>
            <div>
                <label for="list_save">
                    <button type="submit" name="list_save">Save List</button>
                </label>
                <label for="list_order">
                    <button type="button" name="list_order">Order List</button>
                </label>
                <label for="list_delete">
                    <button type="reset" name="list_delete">Delete List</button>
                </label>

            </div>
        </form>
        <article>

        </article>
    </main>
@endsection
