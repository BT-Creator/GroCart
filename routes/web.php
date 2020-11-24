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

/* General */
Route::get('/', function () {return view('general.index');}) -> name("index_route");
Route::get('/501', function () {return view('placeholder');}) -> name("501_route");

/* Consumer */
Route::get('/{id}/lists', [ConsumerController::class, 'index']) -> name('consumer_lists');
Route::get('/user/list/1', [ConsumerController::class, 'openExistingList']) -> name('open_list');
Route::get('/{id}/newList', [ConsumerController::class, 'openNewList']) -> name('create_list');
Route::get('/{id}/profile', [ConsumerController::class, 'openProfile']) -> name('consumer_profile');

Route::get('/user/register', function () {return view('auth.register');}) -> name('consumer_register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
