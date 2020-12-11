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

/* GENERAL */
Route::get('/', function () {return view('general.index');}) -> name("index_route");
Route::get('/501', function () {return view('placeholder');}) -> name("501_route");

Route::group(["prefix" => "consumer"], function (){
    /* Index */
    Route::get('/{id}/list', [ConsumerController::class, 'index']) -> middleware('auth') -> name('consumer_lists');
    /* List */
    Route::get('/{id}/list/{list}', [ConsumerController::class, 'openExistingList']) -> middleware('auth') -> name('open_list');
    Route::get('/{id}/newList', [ConsumerController::class, 'openNewList']) -> middleware('auth') -> name('create_list');
    Route::post('/{id}/list/{list}', [ConsumerController::class, 'updateExistingList']) -> middleware('auth') -> name('update_list');
    Route::post('/{id}/newList', [ConsumerController::class, 'addList']) -> middleware('auth') -> name('add_list');
    Route::get('/{id}/list/{list}/delete', [ConsumerController::class, 'deleteList']) -> middleware('auth') -> name('delete_list');
    /* Profile */
    Route::get('/{id}/profile', [ConsumerController::class, 'openProfile']) -> middleware('auth') -> name('consumer_profile');
    /*Order*/
    Route::get('/{id}/order/{order}/pay', [ConsumerController::class, 'makeOrder']) -> middleware('auth') -> name('make_order');
    Route::get('/{id}/order/{order}', [ConsumerController::class, 'openOrder']) -> middleware('auth') -> name('open_order');
});

/* AUTH */
Route::get('/user/register', function () {return view('auth.register');}) -> name('consumer_register');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
