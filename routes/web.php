<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('items', ItemController::class);
Route::get('cart', [ItemController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ItemController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ItemController::class, 'updateCart'])->name('update_cart');
Route::delete('remove-from-cart', [ItemController::class, 'removeFromCart'])->name('remove_from_cart');

// Route::middleware(['auth'])->group(function () {
//     Route::resource('items', ItemController::class);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
