<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryAgentController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::view('dashbord', 'dashbord');
    Route::get('cities/search',[CityController::class,'search'])->name('cities.search');
    Route::resource('cities', CityController::class);
    Route::get('branches/search', [BranchController::class,'search'])->name('branches.search');
    Route::resource('branches', BranchController::class);
    Route::post('customers/find', [CustomerController::class, 'find'])->name('customers.find');
    Route::resource('customers', CustomerController::class);

    //product_orders route
    Route::get('product-orders/{customer}', [ProductOrderController::class, 'create'])->name('product-orders.create');
    Route::post('product-orders/{customer}', [ProductOrderController::class, 'store'])->name('product-orders.store');
    Route::get('product-orders', [ProductOrderController::class, 'index'])->name('product-orders.index');
    Route::delete('product-orders/{productOrder}', [ProductOrderController::class, 'destroy'])->name('product-orders.destroy');
    Route::get('product-orders/{productOrder}/show', [ProductOrderController::class, 'show'])->name('product-orders.show');
    Route::get('product-orders/{productOrder}/edit', [ProductOrderController::class, 'edit'])->name('product-orders.edit');
    Route::put('product-orders/{productOrder}', [ProductOrderController::class, 'update'])->name('product-orders.update');
    Route::post('product-orders/{productOrder}/assing', [ProductOrderController::class, 'assing'])->name('product-orders.assign');
    Route::post('product-orders/{productOrder}/delivered', [ProductOrderController::class, 'delivered'])->name('product-orders.delivered');
    Route::post('product-orders/{productOrder}/not-deliver', [ProductOrderController::class, 'noteliver'])->name('product-orders.not-deliver');
    // Route::resource('product-orders', ProductOrderController::class);
    
    //user route
    Route::get('users/search',[UserController::class,'search'])->name('users.search');
    Route::get('users',[UserController::class,'index'])->name('users.index');
    Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::get('users/{user}',[UserController::class,'edit'])->name('users.edit');
    Route::post('users/{user}',[UserController::class,'update'])->name('users.update');
    Route::get('users/{user}/change-password',[UserController::class,'changePasswordShow'])->name('users.changePasswordShow');
    Route::post('users/{user}/change-password',[UserController::class,'changePassword'])->name('users.changePassword');
    
    //comments route
    Route::post('product-orders/{productOrder}/comments', [CommentController::class, 'store'])->name('comments.store');

});
Route::group(['middleware' => ['role:user|admin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('cities', CityController::class);
});

Route::group(['middleware' => ['role:delivery_agent|user|admin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('delivery-agent',[DeliveryAgentController::class,'index'])->name('delivery-agent.index');
    Route::get('product-orders/{productOrder}/show', [ProductOrderController::class, 'show'])->name('product-orders.show');
    Route::post('product-orders/{productOrder}/delivered', [ProductOrderController::class, 'delivered'])->name('product-orders.delivered');
    Route::post('product-orders/{productOrder}/not-deliver', [ProductOrderController::class, 'noteliver'])->name('product-orders.not-deliver');
    Route::post('product-orders/{productOrder}/comments', [CommentController::class, 'store'])->name('comments.store');
});
