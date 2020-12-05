@extends('consumer.master_consumer')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/consumer/list-mod.css')}}">
@endsection

@section('title')
    List Name
@endsection

@section('main')
    <main>
        @if($errors -> any())
            <mark>Something went wrong</mark>
            <details>
                <ul>
                @foreach($errors -> all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </details>
        @endif
        @isset($details, $items)
        <form method="post" action="{{route('update_list', [1, $details['id']])}}">
        @else
        <form method="post" action="{{route('add_list', [1])}}">
        @endisset
            @csrf
            <aside class="list-top-bar" aria-label="list-top-bar">
                <a><span class="fas fa-plus-circle"></span>New Item</a>
                <label for="picking_method">
                    <span class="fas fa-hand-holding"></span>
                    Picking Method:
                    @isset($details['picking_method'])
                        <input type="text" placeholder="Picking method" name="picking_method"
                               id="picking_method"
                               value="{{$details['picking_method']}}" maxlength="64">
                    @else
                        <input type="text" placeholder="Picking method" name="picking_method"
                               id="picking_method" maxlength="64">
                    @endisset
                </label>
            </aside>
            <div class="list-main">
                <fieldset>
                    <legend>Items</legend>
                    <div class="new-items-container">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Items in List</legend>
                    <div class="list-items-container">
                        @isset($details, $items)
                            @foreach($items[$details['id']] as $item)
                                <section class="list-item" draggable="true">
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
                                    <label for="item:{{$item['id']}}" hidden="hidden">
                                        <input type="checkbox" checked="checked" hidden="hidden"
                                               id="item:{{$item['id']}}" name="item:{{$item['id']}}"
                                               value="{{collect($item)-> toJson()}}">
                                    </label>
                                </section>
                            @endforeach
                        @endisset
                    </div>
                </fieldset>
            </div>
            <aside class="list-bottom-bar" aria-label="list-bottom-bar">
                <section>
                    <h3><span class="fas fa-store"></span>Store Address:</h3>
                    <label for="store_street">
                        Street:
                        @isset($details['store_street'])
                            <input type="text" placeholder="street" name="store_street" required="required"
                                   id="store_street" value="{{$details['store_street']}}" maxlength="64">
                        @else
                            <input type="text" placeholder="street" name="store_street" required="required"
                                   id="store_street" maxlength="64">
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
                        @isset($details['delivery_street'])
                            <input type="text" placeholder="Street" name="delivery_street" required="required"
                                   id="delivery_street" value="{{$details['delivery_street']}}" maxlength="64">
                        @else
                            <input type="text" placeholder="Street" name="delivery_street" required="required"
                                   id="delivery_street" maxlength="64">
                        @endisset
                    </label>
                    <label for="delivery_number">
                        Number:
                        @isset($details['delivery_house_number'])
                            <input type="text" name="delivery_number" required="required" id="delivery_number"
                                   placeholder="Number" value="{{$details['delivery_house_number']}}" maxlength="6">
                        @else
                            <input type="text" name="delivery_number" required="required" id="delivery_number"
                                   placeholder="Number" maxlength="6">
                        @endisset
                    </label>
                    <label for="delivery_postal_code">
                        Postal code:
                        @isset($details['delivery_postal_code'])
                            <input type="text" name="delivery_postal_code" required="required" id="delivery_postal_code"
                                   placeholder="Postal Code" value="{{$details['delivery_postal_code']}}" maxlength="8">
                        @else
                            <input type="text" name="delivery_postal_code" required="required" id="delivery_postal_code"
                                   placeholder="Postal Code" maxlength="8">
                        @endisset
                    </label>
                    <label for="delivery_city">
                        City:
                        @isset($details['delivery_city'])
                            <input type="text" name="delivery_city" required="required" id="delivery_city"
                                   placeholder="City" value="{{$details['delivery_city']}}" maxlength="64">
                        @else
                            <input type="text" name="delivery_city" required="required" id="delivery_city"
                                   placeholder="City" maxlength="64">
                        @endisset
                    </label>
                    <label for="delivery_country">
                        Country:
                        @isset($details['delivery_country'])
                            <input type="text" name="delivery_country" required="required" id="delivery_country"
                                   placeholder="Country" value="{{$details['delivery_country']}}" maxlength="64">
                        @else
                            <input type="text" name="delivery_country" required="required" id="delivery_country"
                                   placeholder="Country" maxlength="64">
                        @endisset
                    </label>
                </section>
                <section>
                    <h3><span class="fas fa-sticky-note"></span>Delivery Notes</h3>
                    <label for="delivery_notes">
                        @isset($details['delivery_notes'])
                            <textarea name="delivery_notes" id="delivery_notes"
                                      placeholder="Delivery notes">{{$details['delivery_notes']}}</textarea>
                        @else
                            <textarea name="delivery_notes" id="delivery_notes"
                                      placeholder="Delivery notes"></textarea>
                        @endisset
                    </label>
                </section>
                <section>
                    <h3><span class="fas fa-notes-medical"></span>Medical Notes</h3>
                    <label for="medical_notes">
                        @isset($details['medical_notes'])
                            <textarea name="medical_notes" id="medical_notes"
                                      placeholder="Medical notes">{{$details['medical_notes']}}</textarea>
                        @else
                            <textarea name="medical_notes" id="medical_notes"
                                      placeholder="Medical notes"></textarea>
                        @endisset
                    </label>
                </section>
                <section>
                    <h3>List options</h3>
                    <label for="list_save">
                        <button type="submit" id="list_save" class="button"><span
                                class="fas fa-save"></span>Save List
                        </button>
                    </label>
                    @isset($details, $items)
                        <label for="list_order">
                            <button type="button" name="list_order" id="list_order" class="button"><span
                                    class="fas fa-money-bill-wave-alt"></span>Order List
                            </button>
                        </label>
                        <label for="list_delete">
                            <button type="reset" name="list_delete" id="list_delete" class="button"><span
                                    class="fas fa-trash"></span>Delete List
                            </button>
                        </label>
                    @endisset
                </section>
            </aside>
        </form>
    </main>
    <form class="new-item-form">
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

        <label for="item-note">Special notes:</label>
        <textarea name="item-note" id="item-note" placeholder="Write here your special needs..."></textarea>
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
