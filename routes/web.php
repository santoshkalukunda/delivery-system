<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::view('dashbord', 'dashbord');

Route::resource('cities', CityController::class);
Route::resource('branches', BranchController::class);
Route::get('customers/find', [CustomerController::class,'view'])->name('customers.view');
Route::post('customers/find', [CustomerController::class,'find'])->name('customers.find');
Route::resource('customers', CustomerController::class);