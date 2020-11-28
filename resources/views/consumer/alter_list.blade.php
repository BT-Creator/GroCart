@extends('consumer.master_consumer')

@section('title')
    List Name
@endsection

@section('main')
    <main>
        <form>
            <aside id="list-top-bar" aria-label="list-top-bar">
                <a><span class="fas fa-plus-circle"></span>New Item</a>
                <label for="picking_method">
                    <span class="fas fa-hand-holding"></span>
                    Picking Method:
                    @isset($details)
                        <input type="text" placeholder="How do you want your items to be chosen?" name="picking_method"
                               id="picking_method"
                               value="{{$details['picking_method']}}" maxlength="64">
                    @else
                        <input type="text" placeholder="How do you want your items to be chosen?" name="picking_method"
                               id="picking_method" maxlength="64">
                    @endisset
                </label>
            </aside>
            <div id="list-main">
                <article>
                    <h1>Items</h1>
                    <div class="new-items-container">
                    </div>
                </article>
                <article>
                    <h1>Items in List</h1>
                    <div class="list-items-container">
                    </div>
                </article>
            </div>
            <aside id="list-bottom-bar" aria-label="list-bottom-bar">
                <section>
                    <h3><span class="fas fa-store"></span>Store Address:</h3>
                    <label for="store_street">
                        Street:
                        @isset($details['store_street'])
                            <input type="text" placeholder="street" name="store_address" required="required"
                                   id="store_street" value="{{$details['store_street']}}" maxlength="64">
                        @else
                            <input type="text" placeholder="street" name="store_address" required="required"
                                   id="store_address" maxlength="64">
                        @endisset
                    </label>
                    <label for="store_number">
                        Number:
                        @isset($details['store_house_number'])
                            <input type="text" name="store_number" required="required" id="store_number"
                                   placeholder="House number" value="{{$details['store_house_number']}}" maxlength="6">
                        @else
                            <input type="text" name="store_number" required="required" id="store_number"
                                   placeholder="House number" maxlength="6">
                        @endisset
                    </label>
                    <label for="store_postal_code">
                        Postal code:
                        @isset($details['store_postal_code'])
                            <input type="text" name="store_postal_code" required="required" id="store_postal_code"
                                   placeholder="Postal Code" value="{{$details['store_postal_code']}}" maxlength="8">
                        @else
                            <input type="text" name="store_postal_code" required="required" id="store_postal_code"
                                   placeholder="Postal Code" maxlength="8">
                        @endisset
                    </label>
                    <label for="store_city">
                        City:
                        @isset($details['store_city'])
                            <input type="text" name="store_city" required="required" id="store_city" placeholder="City"
                                   value="{{$details['store_city']}}" maxlength="64">
                        @else
                            <input type="text" name="store_city" required="required" id="store_city" placeholder="City"
                                   maxlength="64">
                        @endisset
                    </label>
                    <label for="store_country">
                        Country:
                        @isset($details['store_country'])
                            <input type="text" name="store_country" required="required" id="store_country"
                                   placeholder="Country" maxlength="64" value="{{$details['store_country']}}">
                        @else
                            <input type="text" name="store_country" required="required" id="store_country"
                                   placeholder="Country" maxlength="64">
                        @endisset
                    </label>
                </section>
                <section>
                    <h3><span class="fas fa-home"></span>Delivery address:</h3>
                    <label for="delivery_street">
                        Street:
                        <input type="text" placeholder="Street" name="delivery_address" required="required"
                               id="delivery_street">
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
        <mark></mark>
        <div>
            <h3>Add a new item</h3>
            <a class="fas fa-times-circle"></a>
        </div>

        <label for="item-name">Name:</label>
        <input type="text" name="item-name" id="item-name" required="required" placeholder="Name">

        <label for="item-brand">Brand:</label>
        <input type="text" name="item-brand" id="item-brand" placeholder="Brand">

        <label for="item-weight">Weight:</label>
        <input type="text" name="item-weight" id="item-weight" placeholder="Weight">

        <label for="item-unit"></label>
        <select name="item-unit" id="item-unit">
            <option value="Kilogram">Kg</option>
            <option value="Litre">L</option>
        </select>

        <label for="item-notes">Special notes:</label>
        <textarea name="item-notes" id="item-notes" placeholder="Write here your special needs..."></textarea>
        <label for="item-add"></label>
        <input type="submit" value="Add item" id="item-add" name="item-name">
    </form>
@endsection

@section("js")
    <script type="module" src="{{asset('assets/js/modules/draggable.js')}}"></script>
    <script type="module" src="{{asset('assets/js/modules/factory.js')}}"></script>
    <script type="module" src="{{asset('assets/js/modules/selectors.js')}}"></script>
    <script type="module" src="{{asset('assets/js/newItem.js')}}"></script>
@endsection
