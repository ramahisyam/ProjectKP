<?php

//use App\Http\Controllers\CustomerRequestController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BlogController;

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
    return view('layouts.app');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('dashboard', BlogController::class);

//Route::resource('/users', BlogController::class);

//Route search
//Route::get('/search', [BlogController::class, 'search'])->name('search');
Route::resource('customer', CustomerRequestController::class);

// Route::get('/customer','CustomerRequestController@index');
// Route::get('/customer/cari{$cari}','CustomerRequestController@cari');

// Route::get('/', function () {
// 	$services = Service::paginate(5);
//     return view('dashboard', compact('services'));
// });

//Route::resource('dashboard', CustomerRequestController::class);

