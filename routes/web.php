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

// Customer Request
Route::resource('customer', CustomerRequestController::class);
Route::get('/customer', function(){
    return redirect()->route('home');
});

// Backroom
Route::get('/backroom', 'BackroomController@index')->middleware('permission:backroom')->name('backroom.index');
Route::get('/backroom/{status}/edit', 'BackroomController@edit')->name('backroom.edit');
Route::put('/backroom/{status}', 'BackroomController@update')->name('backroom.update');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User
Route::get('/admin/users', 'UserController@index')->name('user.index');
Route::get('/admin/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

//Admin Settings
Route::get('/settings', [App\Http\Controllers\AdminSettingController::class, 'edit'])->name('admin.edit');
Route::put('/settings', [App\Http\Controllers\AdminSettingController::class, 'update'])->name('admin.update');
Route::get('/change-password', [App\Http\Controllers\AdminSettingController::class, 'changePassword'])->name('changePassword');
Route::post('/change-password', [App\Http\Controllers\AdminSettingController::class, 'updatePassword'])->name('updatePassword');

//Service
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');
Route::get('/service/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('service.create');
Route::post('/service/create', [App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
Route::delete('/service/{service}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy');
Route::get('/service/{service}/edit', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit');
Route::put('/service/{service}', [App\Http\Controllers\ServiceController::class, 'update'])->name('service.update');

// Route::get('/test', function() {
//     return view('super.settings');
// });
