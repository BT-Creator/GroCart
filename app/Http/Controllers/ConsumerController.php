<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    function index(){
        return view('consumer.lists');
    }
}
