<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('customer', CustomerRequestController::class);
Route::get('/customer', function(){
    return redirect()->route('home');
});

Route::get('/backroom', 'BackroomController@index')->middleware('permission:backroom')->name('backroom.index');
Route::get('/backroom/{status}/edit', 'BackroomController@edit')->name('backroom.edit');
Route::put('/backroom/{status}', 'BackroomController@update')->name('backroom.update');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('super', [App\Http\Controllers\SuperController::class, 'index'])->name('super');
Route::get('super/users', [App\Http\Controllers\SuperUsersController::class, 'index'])->name('super.users');
Route::get('super/services', [App\Http\Controllers\SuperServicesController::class, 'index'])->name('super.services');
Route::get('super/services/edit', [App\Http\Controllers\SuperServicesEditController::class, 'index'])->name('super.edit');
Route::get('/test', function() {
    return view('super.edit');
})->name('home');
Route::get('/test/backrooms', function() {
    return view('super.backrooms.dashboard');
})->name('home');
Route::get('/test/backrooms/edit', function() {
    return view('super.backrooms.edit');
})->name('home');
Route::get('/test/backrooms/edit', function() {
    return view('super.backrooms.edit');
})->name('home');
Route::get('/test/settings', function() {
    return view('super.settings');
})->name('home');