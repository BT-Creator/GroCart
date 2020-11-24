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
        $orders = $this->formatByOrders($data);
        return view('consumer.lists', ['orders' => $orders]);
    }

    function openNewList()
    {
        return view('consumer.alter_list');
    }

    function openExistingList()
    {
        return view('consumer.alter_list');
    }

    function openProfile($id)
    {
        $data = DB::table('orders')
            ->join('items', 'orders.id', '=', 'items.order_id')
            ->select('orders.id', 'items.*')
            ->where('orders.user_id', '=', $id)
            ->where('orders.status', '=', 'completed')
            ->orderByDesc('orders.id')
            ->get();
        $completed_orders = $this->formatByOrders($data);
        return view('consumer.profile', ['order_history' => $completed_orders]);
    }

    function formatByOrders($data){
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
