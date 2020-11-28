<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
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
        $input = $request -> post();
        $items = [];
        foreach ($input as $key => $value){
            if(str_contains($key, 'item')){
                $item = collect(json_decode($value));
                $items[$item -> get('id')] = $item -> toArray();
            }
        }
        dd($request -> post(), $id, $list, $items);
    }

    function addList(Request $request, $id) {
        dd($request, $id);
    }

    function openProfile()
    {
        return view('consumer.profile');
    }

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
}
