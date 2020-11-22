<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    function index($id){
        $db_order_ids = DB::table('orders')
            -> join('items', 'orders.id', '=', 'items.order_id')
            -> select('orders.id')
            -> where('orders.user_id', '=', $id)
            -> where('orders.status', '=', 'draft')
            -> groupBy('orders.id')
            -> get();
        $order_ids = [];
        $data = DB::table('orders')
                    -> join('items', 'orders.id', '=', 'items.order_id')
                    -> select('orders.id', 'items.*')
                    -> where('orders.user_id', '=', $id)
                    -> where('orders.status', '=', 'draft')
                    -> orderByDesc('orders.id')
                    -> get();
        foreach (explode('->', $db_order_ids) as $order_id){
            array_push($order_ids, $order_id);
        }
        dd($order_ids);
        return view('consumer.lists');
    }

    function openList(){
        return view('consumer.alter_list');
    }

    function openProfile(){
        return view('consumer.profile');
    }
}
