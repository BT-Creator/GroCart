<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerApiController extends Controller
{
    function getOrders($id)
    {
        $data = DB::table('orders')
            ->select('orders.*')
            ->where('orders.user_id', '=', $id)
            ->where('orders.status', "!=", "draft")
            ->get();
        $orders = $data->map(function ($item, $key){
            $order = collect($item);
            $amount = DB::table('items')
                -> select('*')
                -> where('items.order_id', '=', $order -> get('id'))
                -> get();
            return [$order -> get('id') => $amount];
        });
        return $orders -> toJson();
    }
}
