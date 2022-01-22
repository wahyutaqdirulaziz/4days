<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerControllers;
use App\Http\Controllers\ItemsControllers;
use App\Http\Controllers\OrderControllers;
use App\Http\Controllers\OrderReportControllers;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('customers',CustomerControllers::class);
Route::resource('items',ItemsControllers::class);
Route::resource('Order',OrderControllers::class);

Route::post('Order-add',[OrderControllers::class,'addToCart'])->name('add-items');
Route::post('Order-update',[OrderControllers::class,'updateCart'])->name('add-update');
Route::get('Order-report',[OrderReportControllers::class,'Orderreport'])->name('order-report');
Route::get('Order-customer',[OrderReportControllers::class,'Ordercustomer'])->name('order-customer');
Route::get('Order-item',[OrderReportControllers::class,'Itemsreport'])->name('order-item');
});