<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    function index($id){
        $lists = Order::all() -> where('status', 'draft');
        echo $id;
        dd($lists);
        return view('consumer.lists');
    }

    function openList(){
        return view('consumer.alter_list');
    }

    function openProfile(){
        return view('consumer.profile');
    }
}
