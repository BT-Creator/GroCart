@extends('consumer.master_consumer')

@section('title')
    List Name
@endsection

@section('main')
    <main>
        <form>
            <aside id="list-top-bar" aria-label="list-top-bar">
                <a><span class="fas fa-plus-circle"></span>New Item</a>
                <label for="list_name">
                    <span class="fas fa-signature"></span>List Name:
                    <input type="text" name="list_name" id="list_name">
                </label>
                <label for="picking_method">
                    <span class="fas fa-hand-holding"></span>
                    Picking Method:
                    <input type="text" placeholder="As cheap as possible" name="picking_method" id="picking_method">
                </label>
            </aside>
            <div id="list-main">
                <!-- All mock data, just deal with it for now -->
                <article>
                    <h1>Items</h1>
                    <div class="new-items-container">
                        <section class="list-item">
                            <h2>Milk</h2>
                            <p>Just plain old milk.</p>
                        </section>
                        <section class="list-item">
                            <h2>Tresors</h2>
                            <p><span class="list-property">Weight:</span> 1 KG</p>
                            <p><span class="list-property">Brand:</span> Kellogs</p>
                        </section>
                        <section class="list-item">
                            <h2>American</h2>
                            <p><span class="list-property">Weight:</span> 0,200 gram</p>
                            <p><span class="list-property">Special Notes:</span> With unions</p>
                        </section>
                    </div>
                </article>
                <article>
                    <h1>Items in List</h1>
                    <div class="list-items-container">
                        <section class="list-item">
                            <h2>Milk</h2>
                            <p>Just plain old milk.</p>
                        </section>
                        <section class="list-item">
                            <h2>Tresors</h2>
                            <p><span class="list-property">Weight:</span> 1 KG</p>
                            <p><span class="list-property">Brand:</span> Kellogs</p>
                        </section>
                        <section class="list-item">
                            <h2>American</h2>
                            <p><span class="list-property">Weight:</span> 0,200 gram</p>
                            <p><span class="list-property">Special Notes:</span> With unions</p>
                        </section>
                    </div>
                </article>
            </div>
            <aside id="list-bottom-bar" aria-label="list-bottom-bar">
                <section>
                    <h3><span class="fas fa-store"></span>Store Address:</h3>
                    <label for="store_address">
                        Street:
                        <input type="text" placeholder="street" name="store_address" required="required"
                               id="store_address">
                    </label>
                    <label for="store_number">
                        Number:
                        <input type="text" name="store_number" required="required" id="store_number"
                               placeholder="House number">
                    </label>
                    <label for="store_postal_code">
                        Postal code:
                        <input type="text" name="store_postal_code" required="required" id="store_postal_code"
                               placeholder="Postal Code">
                    </label>
                    <label for="store_city">
                        City:
                        <input type="text" name="store_city" required="required" id="store_city" placeholder="City">
                    </label>
                    <label for="store_country">
                        Country:
                        <input type="text" name="store_country" required="required" id="store_country"
                               placeholder="Country">
                    </label>
                </section>
                <section>
                    <h3><span class="fas fa-home"></span>Delivery address:</h3>
                    <label for="delivery_address">
                        Street:
                        <input type="text" placeholder="Street" name="delivery_address" required="required"
                               id="delivery_address">
                    </label>
                    <label for="delivery_number">
                        Number:
                        <input type="text" name="delivery_number" required="required" id="delivery_number"
                               placeholder="Number">
                    </label>
                    <label for="delivery_postal_code">
                        Postal code:
                        <input type="text" name="delivery_postal_code" required="required" id="delivery_postal_code"
                               placeholder="Postal Code">
                    </label>
                    <label for="delivery_city">
                        City:
                        <input type="text" name="delivery_city" required="required" id="delivery_city"
                               placeholder="City">
                    </label>
                    <label for="delivery_country">
                        Country:
                        <input type="text" name="delivery_country" required="required" id="delivery_country"
                               placeholder="Country">
                    </label>
                </section>
                <section>
                    <h3><span class="fas fa-sticky-note"></span>Delivery Notes</h3>
                    <label for="delivery_notes">
                        <textarea name="delivery_notes" id="delivery_notes"
                                  placeholder="Delivery notes"></textarea>
                    </label>
                </section>
                <section>
                    <h3><span class="fas fa-notes-medical"></span>Medical Notes</h3>
                    <label for="medical_notes">
                        <textarea name="medical_notes" id="medical_notes"
                                  placeholder="Medical notes"></textarea>
                    </label>
                </section>
                <section>
                    <h3>List options</h3>
                    <label for="list_save">
                        <button type="submit" name="list_save" id="list_save" class="button"><span
                                class="fas fa-save"></span>Save List
                        </button>
                    </label>
                    <label for="list_order">
                        <button type="button" name="list_order" id="list_order" class="button"><span
                                class="fas fa-money-bill-wave-alt"></span>Order List
                        </button>
                    </label>
                    <label for="list_delete">
                        <button type="reset" name="list_delete" id="list_delete" class="button"><span
                                class="fas fa-trash"></span>Delete
                            List
                        </button>
                    </label>
                </section>
            </aside>
        </form>
    </main>
    <form id="new-item-form">
        <div>
            <h3>Add a new item</h3>
            <a class="fas fa-times-circle"></a>
        </div>

        <label for="item-name">Name:</label>
        <input type="text" name="item-name" id="item-name" required="required" placeholder="Name">

        <label for="item-brand">Brand:</label>
        <input type="text" name="item-brand" id="item-brand" placeholder="Name">

        <label for="item-weight">Weight:</label>
        <input type="text" name="item-weight" id="item-weight" placeholder="Name">

        <label for="item-unit"></label>
        <select name="item-unit" id="item-unit">
            <option value="kilogram">Kilogram</option>
            <option value="litre">Litre</option>
        </select>

        <label for="item-notes">Special notes:</label>
        <textarea name="item-notes" id="item-notes" placeholder="Write here your special needs..."></textarea>
        <label for="item-add"></label>
        <input type="submit" value="Add item" id="item-add" name="item-name">
    </form>
@endsection

@section("js")
    <script src="{{asset('assets/js/newList.js')}}"></script>
@endsection
