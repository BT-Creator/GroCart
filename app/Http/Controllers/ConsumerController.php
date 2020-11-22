<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    function index($id){
        $orders = DB::table('orders')
                    -> join('items', 'orders.id', '=', 'items.order_id')
                    -> select('orders.id', 'items.*')
                    -> where('orders.user_id', '=', $id)
                    -> where('orders.status', '=', 'draft')
                    -> get();
        dd($orders);
        return view('consumer.lists');
    }

    function openList(){
        return view('consumer.alter_list');
    }

    function openProfile(){
        return view('consumer.profile');
    }
}
