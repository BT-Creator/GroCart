<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    //Main Functions
    function index($id)
    {
        $data = DB::table('orders')
            ->join('items', 'orders.id', '=', 'items.order_id')
            ->select('orders.id', 'items.*')
            ->where('orders.user_id', '=', $id)
            ->where('orders.status', '=', 'draft')
            ->orderByDesc('orders.id')
            ->get();
        $res = $this->formatByOrders($data);
        return view('consumer.lists', ['orders' => $res]);
    }

    function openNewList()
    {
        return view('consumer.alter_list');
    }

    function openExistingList($id, $list)
    {
        $items = DB::table('orders')
            ->join('items', 'orders.id', '=', 'items.order_id')
            ->select('items.*')
            ->where('orders.user_id', '=', $id)
            ->where('orders.id', '=', $list)
            ->get();
        $items = $this->formatByOrders($items);
        $order_details = DB::table('orders')
            ->join('deliveries', 'orders.delivery_id', '=', 'deliveries.id')
            ->join('stores', 'orders.store_id', '=', 'stores.id')
            ->select('orders.id', 'orders.picking_method', 'orders.delivery_notes', 'orders.medical_notes',
                'deliveries.street as delivery_street', 'deliveries.house_number as delivery_house_number',
                'deliveries.postal_code as delivery_postal_code', 'deliveries.city as delivery_city',
                'deliveries.country as delivery_country',
                'stores.street as store_street', 'stores.house_number as store_house_number',
                'stores.postal_code as store_postal_code', 'stores.city as store_city', 'stores.country as store_country')
            ->where('orders.user_id', '=', $id)
            ->where('orders.id', '=', $list)
            ->get();
        $order_details = collect($order_details->get(0));
        return view('consumer.alter_list', ['details' => $order_details, 'items' => $items]);
    }

    function updateExistingList(Request $request, $id, $list) {
        $item_attributes = [];
        foreach ($request -> post() as $key => $value){
            if(str_contains($key, 'item:')){
                array_push($item_attributes, $key);
            }
        }
        $details = $this -> validateList($request);
        $items = $this -> validateItems($request, $item_attributes);
        dd($details,$items);
        dd($details, $request, $items);
        foreach ($input as $key => $value){
            if(str_contains($key, 'item')){
                $item = collect(json_decode($value));
                if(!$item -> contains('order_id')){
                    $item -> put('order_id', $list);
                }
                $items[$item -> get('id')] = $item -> forget('id') -> toArray();
            }
            else{
                $details[$key] = $value;
            }
        }
        $ref = $this -> formatByItems(collect(DB::table('items')
                                        -> where('order_id', '=', $list)
                                        -> get()));
        $this -> updateItemDB($items, $ref);
        dd($items, $ref, $details);
    }


    function addList(Request $request, $id) {
        dd($request, $id);
    }

    function openProfile()
    {
        return view('consumer.profile');
    }

    //Format Functions
    function formatByOrders($data)
    {
        $first_item = collect($data->shift());
        $first_item_id = $first_item->get('order_id');
        $res = array(
            $first_item_id => array($first_item->toArray())
        );
        foreach ($data as $item) {
            $object = collect($item);
            foreach ($res as $key => $value) {
                if ($key === $object->get('order_id')) {
                    array_push($value, $object->toArray());
                    $res[$key] = $value;
                } else {
                    $res[$object->get('order_id')] = array($object->toArray());
                }
            }
        }
        return $res;
    }

    function formatByItems($data){
        $res = [];
        foreach ($data as $key => $entry){
            $entry = collect($entry);
            $res[$entry -> get('id')] = collect($entry) -> toArray();
        }
        return $res;
    }

    //DB Sub-functions
    private function updateItemDB($items, $ref){
        foreach (array_keys($ref) as $key){
            if(!key_exists($key, $items)){
                echo "Deleting item $key";
            }
        }
    }

    //Validation
    private function validateList(Request $request){
        $rules = [
            "picking_method" => "nullable|string|max:64",
            "store_street" => "string|max:64",
            "store_number" => "string|max:6",
            "store_postal_code" => "string|max:8",
            "store_city" => "string|max:64",
            "store_country" => "string|max:64",
            "delivery_street" => "string|max:64",
            "delivery_number" => "string|max:6",
            "delivery_postal_code" => "string|max:8",
            "delivery_city" => "string|max:64",
            "delivery_country" => "string|max:64",
            "delivery_notes" => "string|nullable",
        ];
        return $request -> validate($rules);
    }

    private function validateItems(Request $request, array $item_attributes){
        $rules = [];
        foreach ($item_attributes as $attribute){
            $rules[$attribute] = "json";
        }
        return $request -> validate($rules);
    }
}
