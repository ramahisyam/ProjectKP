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

Auth::routes([
    'register' => false, 
    'reset' => false, 
    'verify' => false,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');