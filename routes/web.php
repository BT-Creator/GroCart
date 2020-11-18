<?php

use App\Http\Controllers\ConsumerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('general.index');}) -> name("index_route");

Route::get('/501', function () {return view('placeholder');}) -> name("501_route");

Route::get('/user/lists', [ConsumerController::class, 'index']) -> name('consumer_lists');

Route::get('/user/list/1', [ConsumerController::class, 'openList']) -> name('open_list');

Route::get('/user/profile', [ConsumerController::class, 'openProfile']) -> name('consumer_profile');
